<?php

namespace App\Services\Payments\App\Events;

use App\Services\Payments\App\Events\DTO\PaymentWaitingData;

class PaymentWaitingEvent
{
    
    public function __construct(

        public PaymentWaitingData $data,

    ) {}

}
