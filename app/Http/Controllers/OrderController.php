<?php

namespace App\Http\Controllers;

use App\services\Orders\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        
        $orders = Order::query()->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order, Request $request)
    {

        $user = $request->user();

        // abort_unless($user->owns($order), 404);
        

        return view('orders.show', compact('order'));
        // dd($order->toArray());
    }
}
