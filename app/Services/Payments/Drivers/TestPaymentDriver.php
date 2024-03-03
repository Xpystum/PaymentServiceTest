<?php

namespace App\Services\Payments\App\Drivers;

use App\Services\Payments\Interface\PaymentDriverInterface;

class TestPaymentDriver implements PaymentDriverInterface
{
    public function foo(): string
    {
        return 'bar';
    }

}