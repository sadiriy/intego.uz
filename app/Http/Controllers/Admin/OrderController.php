<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('created_at', 'DESC')->orderBy('status', 'DESC')->get();

        return view('back/orders')->with([
            'orders' => $orders,
        ]);
    }

    public function activate(Order $order){
        $order->status = $order->status ? 0 : 1;
        $order->save();

        return redirect()->route('orders.index');
    }
}
