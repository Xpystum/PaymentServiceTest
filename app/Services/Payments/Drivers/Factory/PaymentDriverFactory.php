<?php

namespace App\Services\Payments\Drivers\Factory;

use App\Services\Payments\Drivers\TestPaymentDriver;
use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Interface\PaymentDriverInterface;
use InvalidArgumentException;

class PaymentDriverFactory
{
    public function make(PaymentDriverEnum $driver): PaymentDriverInterface
    {
        return match ($driver) {
            
            PaymentDriverEnum::test => new TestPaymentDriver(),
            
            default => throw new InvalidArgumentException(
            
                "Драйвер [{$driver}] не поддерживается"
            
            )
        
        };
    }

}





