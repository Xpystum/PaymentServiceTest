<?php

namespace App\Services\Payments;

use App\Services\Payments\App\Actions\CancelPayment;
use App\Services\Payments\App\Actions\CompletePayment;
use App\Services\Payments\App\Actions\CreatePaymentAction;
use App\Services\Payments\App\Actions\FindPaymentMethodAction;
use App\Services\Payments\App\Actions\GetPaymentMethodsAction;
use App\Services\Payments\App\Actions\GetPaymentsAction;
use App\Services\Payments\App\Actions\UpdatePaymentAction;
use App\Services\Payments\Drivers\Factory\PaymentDriverFactory;
use App\Services\Payments\database\Enums\PaymentDriverEnum;
use App\Services\Payments\Interface\PaymentDriverInterface;

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

    public function getPayments() : GetPaymentsAction
    {   
        return new GetPaymentsAction;
    }

    public function getPaymentMethods() : GetPaymentMethodsAction
    {
        return new GetPaymentMethodsAction;
    }

    public function updatePayment() : UpdatePaymentAction
    {   
        return new UpdatePaymentAction;
    }

    public function completePayment() : CompletePayment
    {       
        return new CompletePayment;
    }

    public function cancelPayment() : CancelPayment
    {   
           
        return new CancelPayment;
    }

 


    

    
}