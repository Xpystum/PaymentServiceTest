<?php

namespace App\Http\Controllers;

use App\services\Orders\Models\Order;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\PaymentService;
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

    public function payment(Order $order, PaymentService $paymentService)
    {

        //создаём экзампляр сервеса
        // $service = new PaymentService;

        //получаем Action сервеса
        // $action = $service->createPayment($order);

        //Запускаем работу этого Action (Bulder)
        // $action->run();

        //таким подходом мы можем контролировать создание payment (и например создать метод оплаты без комиссии и т.д более гибко)
        $payment = $paymentService
            ->createPayment()
            ->payable($order)
            ->run();

        

        return to_route('payments.checkout', $payment->uuid);
    }
}
