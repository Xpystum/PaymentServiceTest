<?php

namespace App\Services\Orders\Listeners;

use Exception;
use App\services\Orders\Models\Order;
use App\Services\Orders\OrderService;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Payments\App\Events\PaymentWaitingEvent;

class WaitingOrderListener implements ShouldQueue
{

    public function __construct(

        private OrderService $orderService,

    ) { }
   

    public function handle(

        PaymentWaitingEvent $event,

    ): void {

        $paybleType = $event->data->payableType;
        $payableId = $event->data->payableId;


        //проверка типа
        if($paybleType !== (new Order)->getPayableType()){
            return;
        }

    
        if($order = Order::query()->find($payableId)){

            $this->orderService->waitingOrder()->run($order);

        } else {

            throw new Exception('Ошибка отправки event на изменение состояние платежа');

        }
        
    }
}
