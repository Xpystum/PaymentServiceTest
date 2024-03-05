<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\Database\Models\Payment;

use App\Services\Payments\Interface\Payable;
use Illuminate\Support\Str;


class CreatePaymentAction
{
    //заказ (Услуга, подписка и т.д)
    private readonly Payable $payable;
    
    public function payable(Payable $payable): static
    {
        
        $this->payable = $payable;

        return $this;

    }
    public function run() : Payment
    {  

        $payment = Payment::query()

            ->create([
                'uuid' => (string) Str::uuid() ,
                
                'status' => PaymentStatusEnum::pending,
        
                'currency_id' => $this->payable->getPayableCurrencyId(),

                'amount' => $this->payable->getPayableAmount(),
        
                'payable_type' => $this->payable->getPayableType(), 

                'payable_id' => $this->payable->getPayableId() ,
        
                'method_id' => null ,
        
                'drive' => null ,

        ]);


        return $payment;
    }

}



