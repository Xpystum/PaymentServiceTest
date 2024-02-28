<?php

namespace App\Http\Controllers;

use App\services\Orders\Models\Order;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;
use Illuminate\Support\Str;
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

        return view('orders.show', compact('order'));
   
    }

    public function payment(Order $order){


        $payment = Payment::query()
            ->create([

                'uuid' => (string) Str::uuid() ,
                
                'status' => PaymentStatusEnum::pending,
        
                'currency_id' => $order->currency_id ,

                'amount' => $order->amount ,
        
                'payable_type' => $order->getMorphClass(), 

                'payable_id' => $order->id ,
        
                'method_id' => null ,
        
                'drive' => null ,

            ]);
        
        
        return to_route('payments.checkout', $payment->uuid);
    }
}
