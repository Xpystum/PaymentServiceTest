<?php

namespace App\Services\Ykassa\App\Events;

use App\Services\Ykassa\App\Events\DTO\PaymentCancelData;

class PaymentCancelEvent
{
    public function __construct(

        public PaymentCancelData $data,

    ) {}
}
