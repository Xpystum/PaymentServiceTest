<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Models\Payment;
use App\Services\Payments\Database\Models\PaymentMethod;

class UpdatePaymentAction{

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
            // dd($this->method->driver->value);
            $payment->fill([
                'method_id' => $this->method->id,
                'driver' => $this->method->driver,
            ]);
        }
       
        return $payment->save();
    }
}



