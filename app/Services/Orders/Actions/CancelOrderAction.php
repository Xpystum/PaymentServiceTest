<?php

namespace App\Services\Orders\Actions;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\services\Orders\Models\Order;

class CancelOrderAction 
{
   
    public function run(Order $order): bool
    {

        $order->status = OrderStatusEnum::cancelled;

        return $order->save();
    }

}
    