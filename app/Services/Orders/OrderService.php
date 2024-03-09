<?php

namespace App\Services\Orders;

use App\Services\Orders\Actions\CancelOrderAction;
use App\Services\Orders\Actions\WaitingOrderAction;
use App\Services\Orders\Actions\CompleteOrderAction;

class OrderService 
{
    public function completeOrder(): CompleteOrderAction
    {
        return new CompleteOrderAction;
    }

    public function cancelOrder(): CancelOrderAction
    {   
        return new CancelOrderAction;
    }

    public function waitingOrder(): WaitingOrderAction
    {   
        return new WaitingOrderAction;
    }
}
    