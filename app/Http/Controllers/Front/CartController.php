<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Mail\NewOrder;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index(){
        return view('front/cart');
    }

    public function store(Request $request){
        $cart_data = $request->validate([
            'id' => 'required|integer|exists:products',
            'count' => 'required|numeric|gte:1',
        ]);
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($cart_data){
            return $cartItem->id === $cart_data['id'];
        });
        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', __('Данный товар уже добавлен'));
        }
        //retrieving data from products
        $product = Product::where('id', $cart_data['id'])->firstOrFail();
        Cart::add($cart_data['id'], $product->name_ru, $cart_data['count'], $product->price)
        ->associate('App\Models\Product');

        return back()->with('success_message', __('Товар добавлен'));
    }

    public function destroy($id){
        Cart::remove($id);
        return back()->with('success_message', __('Товар удален'));
    }

    public function send(Request $request){
        if (!$request['name'] || !$request['phone'] || Cart::count() == 0){
            return redirect('/')->with('error_message', __('Произошла ошибка, повторите еще раз'));
        }
        $request['phone'] = correct_phone($request['phone']);
        $client_info = $request->validate([
            'name' => 'required|string|min:2',
            'phone' => 'required|numeric|digits:12',
        ]);

        $order = new Order();
        $order->total_sum = (int)Cart::total();
        $order->client_name = $client_info['name'];
        $order->client_phone = $client_info['phone'];
        $order->status = 0;
        $order->save();

        foreach (Cart::content() as $product){
            $order_products = new OrderProducts();
            $order_products->name = $product->model->name_ru;
            $order_products->slug = $product->model->slug;
            $order_products->order_id = $order->id;
            $order_products->price = $product->model->price ?? '';
            $order_products->amount = $product->qty;
            $order_products->save();
        }
//        Mail::to('sardorsadiriy@gmail.com')->send(new NewOrder($order));

        Cart::instance('default')->destroy();
        return redirect('/')->with('success_message', __('Ваша заявка принята'));

    }

    public function clear(){
        Cart::destroy();
        return redirect('/')->with('success_message', __('Корзина очищена'));
    }
}
