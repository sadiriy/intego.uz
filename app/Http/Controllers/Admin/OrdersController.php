<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::orderBy('date', 'DESC')->get();

        return view('back/orders')->with([
            'orders' => $orders,
        ]);
    }

    public function activate(Order $order){
        if ($order->checked == 0) {
            Order::findOrFail($order->id)->update([
                'checked' => 1
            ]);
        } else {
            Order::findOrFail($order->id)->update([
                'checked' => 0
            ]);
        }
        return redirect()->route('orders.index');
    }
}
