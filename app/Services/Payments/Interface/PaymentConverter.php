<?php

namespace App\Services\Payments\Interface;

use app\Support\Values\AmountValue;

interface PaymentConverter
{
    public function convert(AmountValue $amount, string $from, string $to): AmountValue;
}
