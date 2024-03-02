<?php

namespace App\Services\Payments;

use App\services\Orders\Models\Order;
use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Actions\FindPaymentMethodAction;
use App\Services\Payments\Actions\GetPaymentMethodsAction;
use App\Services\Payments\Actions\UpdatePaymentAction;
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

    public function getPaymentMethods() : GetPaymentMethodsAction
    {
        return new GetPaymentMethodsAction;
    }

    public function findPaymentMethod() : FindPaymentMethodAction
    {
        return new FindPaymentMethodAction;
    }

    public function updatePayment() : UpdatePaymentAction
    {   
        return new UpdatePaymentAction;
    }


    

    
}