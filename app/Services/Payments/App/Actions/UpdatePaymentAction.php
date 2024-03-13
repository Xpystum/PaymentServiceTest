<?php

namespace App\Services\Payments\App\Actions;

use app\Support\Values\AmountValue;
use App\Services\Currencies\CurrencyService;
use App\Services\Payments\Database\Models\Payment;
use App\Services\Payments\Interface\PaymentConverter;
use App\Services\Payments\Database\Models\PaymentMethod;

class UpdatePaymentAction{

    public function __construct(
        
        private PaymentConverter $converter

    ) { }

   private PaymentMethod|null $method;

    public function method(PaymentMethod $method): static
    {
        $this->method = $method;

        return $this;

    }

    public function run(Payment $payment) : bool
    {
        if(!is_null($this->method))
        {

            $payment->method_id = $this->method->id;
            $payment->driver = $this->method->driver;
            $payment->driver_currency_id = $this->method->driver_currency_id;
            $payment->driver_amount = $this->convertAmount($payment);
            
        }   

       
        return $payment->save();
    }

    private function convertAmount(Payment $payment): AmountValue
    {   
     
        //конвертр валюты в зависимости от выбора валюты провайдера
        return $this->converter
                    ->convert(

                        amount: $payment->amount,

                        from: $payment->currency_id,
                        
                        to: $payment->driver_currency_id

                    );
                   
    }
}



