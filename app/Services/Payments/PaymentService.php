<?php

namespace App\Services\Payments;

use App\services\Orders\Models\Order;
use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Drivers\Factory\PaymentDriverFactory;
use App\Services\Payments\Drivers\TestPaymentDriver;
use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Interface\PaymentDriverInterface;
use App\Services\Payments\Models\PaymentMethod;
use InvalidArgumentException;

class PaymentService
{
    public function getDriver(PaymentDriverEnum $driver): PaymentDriverInterface
    {
        
        return (new PaymentDriverFactory)->make($driver);

    }

    public function createPayment() : CreatePaymentAction
    {

        return new CreatePaymentAction;
    }

    
}