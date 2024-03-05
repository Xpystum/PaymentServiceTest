<?php

namespace App\Services\Payments\App\Events;

use App\Services\Payments\App\Events\DTO\PaymentCancelData;

class PaymentCancelEvent
{
    
    public function __construct(

        public PaymentCancelData $data,
        

    ) { }

}
