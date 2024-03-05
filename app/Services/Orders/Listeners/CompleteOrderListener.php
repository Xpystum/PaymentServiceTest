<?php

namespace App\Services\Orders\Listeners;

use App\services\Orders\Models\Order;
use App\Services\Orders\OrderService;
use App\Services\Payments\App\Events\PaymentCompletedEvent;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompleteOrderListener implements ShouldQueue
{

    public function __construct(

        private OrderService $orderService,

    ) { }
   

    public function handle(

        PaymentCompletedEvent $event,

    ): void {

        $paybleType = $event->data->payableType;
        $payableId = $event->data->payableId;


        //проверка типа
        if($paybleType !== (new Order)->getPayableType()){
            return;
        }

        
    
        if($order = Order::query()->find($payableId)){

            $this->orderService->completeOrder()->run($order);

        } else {

            throw new Exception('Ошибка отправки event на изменение состояние платежа');

        }
        
    }
}
