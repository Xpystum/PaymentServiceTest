<?php

namespace App\Services\Orders\Listeners;

use App\services\Orders\Models\Order;
use App\Services\Orders\OrderService;
use App\Services\Payments\App\Events\PaymentCancelEvent;
use App\Services\Payments\App\Events\PaymentCompletedEvent;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelOrderListener implements ShouldQueue
{

    public function __construct(

        private OrderService $orderService,

    ) { }
   

    public function handle(

        PaymentCancelEvent $event,

    ): void {

        $paybleType = $event->data->payableType;
        $payableId = $event->data->payableId;


        //проверка типа
        if($paybleType !== (new Order)->getPayableType()){
            return;
        }

        
    
        if($order = Order::query()->find($payableId)){

            $this->orderService->cancelOrder()->run($order);

        } else {

            throw new Exception('Ошибка отправки event на изменение состояние платежа');

        }
        
    }
}
