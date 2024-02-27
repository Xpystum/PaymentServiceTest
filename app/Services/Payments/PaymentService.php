<?php

namespace App\Services\Payments;

use App\Services\Payments\Drivers\TestPaymentDriver;
use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Interface\PaymentDriverInterface;
use App\Services\Payments\Models\PaymentMethod;
use InvalidArgumentException;

class PaymentService
{
    public function getDriver(PaymentMethod $method): PaymentDriverInterface
    {
        return match ($method->driver) {

            PaymentDriverEnum::test => new TestPaymentDriver(),

            default => throw new InvalidArgumentException(

                "Драйвер [{$method->driver}] не поддерживается"

            )

        };

    }
    
}