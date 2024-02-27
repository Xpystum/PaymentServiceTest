<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Interface\PaymentDriverInterface;

class TestPaymentDriver implements PaymentDriverInterface
{
    public function foo(): string
    {
        return 'bar';
    }

}