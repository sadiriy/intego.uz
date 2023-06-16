<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Mail\NewOrder;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(){
        return view('front/cart');
    }

    public function store(Request $request){
        $cart_data = $request->validate([
            'id' => 'required|integer|exists:products',
            'name' => 'required|string',
            'count' => 'required|numeric|gte:1',
        ]);
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($cart_data){
            return $cartItem->id === $cart_data['id'];
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', __('Данный товар уже добавлен'));
        }

        Cart::add($request->id, $request->name, 1, 0)
        ->associate('App\Models\Product');

        return back()->with('success_message', __('Товар добавлен'));
    }

    public function destroy($id){
        Cart::remove($id);
        return back()->with('success_message', __('Товар удален'));
    }

    public function send(Request $request){
        $orderDetails = Cart::content()->map(function ($item){
            return 'ID: '.$item->model->id.', Номенклатура: '.$item->model->name_ru.', Количество: '.$item->qty;
        })->values()->toJson();
        $clientName = $request->name;
        $clientPhone = $request->phone;
        $date = Carbon::now();

        $order = Order::create([
            'orderDetails' => $orderDetails,
            'clientName' => $clientName,
            'clientPhone' => $clientPhone,
            'date' => $date,
            'checked' => 0,
        ]);
        
        //$order->notify(new NewOrderNotification($order));
        
        Mail::to('sale1@unioncast.uz')->send(new NewOrder($order));

        Cart::instance('default')->destroy();

        return redirect('/')->with('success_message', __('Ваша заявка принята'));

    }

    public function clear(){
        Cart::destroy();

        return redirect('/')->with('success_message', __('Корзина очищена'));
    }
}
