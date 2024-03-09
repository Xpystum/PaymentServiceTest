<?php

namespace App\Services\Orders\Actions;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\services\Orders\Models\Order;

class WaitingOrderAction 
{
   
    public function run(Order $order): bool
    {

        $order->status = OrderStatusEnum::waiting_for_capture;

        return $order->save();
    }

}
    