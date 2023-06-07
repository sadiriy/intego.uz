<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SingleOrderController extends Controller
{
    public function index(Order $order){
        $orderDetails = json_decode($order->orderDetails);

        return view('back/order')->with([
            'order_details' => $orderDetails,
            'order' => $order,
        ]);
    }
}
