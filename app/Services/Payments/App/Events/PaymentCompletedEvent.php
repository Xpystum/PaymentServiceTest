<?php

namespace App\Services\Payments\App\Events;

use App\Services\Payments\App\Events\DTO\PaymentCompletedData;

class PaymentCompletedEvent
{
    
    public function __construct(

        public PaymentCompletedData $data,


    ) {}

}
