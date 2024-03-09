<?php

namespace App\Services\Payments\Drivers\Factory;

use InvalidArgumentException;
use App\Services\Payments\Drivers\YkassaDriver;
use App\Services\Payments\Drivers\TestPaymentDriver;
use App\Services\Payments\Database\Enums\PaymentDriverEnum;
use App\Services\Payments\Interface\PaymentDriverInterface;

class PaymentDriverFactory
{
    public function make(PaymentDriverEnum $driver): PaymentDriverInterface
    {
        return match ($driver) {
            
            PaymentDriverEnum::test => app(TestPaymentDriver::class),

            PaymentDriverEnum::ykassa => app(YkassaDriver::class),
            
            default => throw new InvalidArgumentException(
            
                "Драйвер [{$driver}] не поддерживается"
            
            )
        
        };
    }

}





