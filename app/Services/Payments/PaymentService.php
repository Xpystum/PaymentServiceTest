<?php

namespace App\Services\Payments;

use App\Services\Payments\App\Actions\GetPaymentsAction;
use App\Services\Payments\App\Actions\CancelPaymentAction;
use App\Services\Payments\App\Actions\CreatePaymentAction;
use App\Services\Payments\App\Actions\UpdatePaymentAction;
use App\Services\Payments\App\Actions\WaitingPaymentAction;
use App\Services\Payments\database\Enums\PaymentDriverEnum;
use App\Services\Payments\Interface\PaymentDriverInterface;
use App\Services\Payments\App\Actions\CompletePaymentAction;
use App\Services\Payments\App\Actions\GetPaymentMethodsAction;
use App\Services\Payments\Drivers\Factory\PaymentDriverFactory;

class PaymentService
{
    public function getDriver(PaymentDriverEnum $driver): PaymentDriverInterface
    {
        return app(PaymentDriverFactory::class)->make($driver);
    }

    public function createPayment() : CreatePaymentAction
    {
        return app(CreatePaymentAction::class);
    }

    public function getPayments() : GetPaymentsAction
    {   
        return app(GetPaymentsAction::class);
    }

    public function getPaymentMethods() : GetPaymentMethodsAction
    {
        return app(GetPaymentMethodsAction::class);
    }

    public function updatePayment() : UpdatePaymentAction
    {   
        return app(UpdatePaymentAction::class);
    }

    public function completePayment() : CompletePaymentAction
    {       
        return app(CompletePaymentAction::class);
    }

    public function waitingPayment() : WaitingPaymentAction
    {       
        return app(WaitingPaymentAction::class);
    }

    public function cancelPayment() : CancelPaymentAction
    {   
        return app(CancelPaymentAction::class);
    }

 


    

    
}