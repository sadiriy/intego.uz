<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index(Order $order){
        $order_products = $order->getOrderProducts($order->id);

        return view('back/order')->with([
            'order_products' => $order_products,
        ]);
    }
}
