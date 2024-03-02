<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;

class UpdatePaymentAction{

   private PaymentMethod|null $method;

    public function method(PaymentMethod $method): static
    {
        $this->method = $method;

        return $this;

    }

    public function run(Payment $payment) : bool
    {
        if(! is_null($this->method)  )
        {
            $payment->fill([
                'method_id' => $this->method->id,
                'driver' => $this->method->name,
            ]);
        }
        return $payment->save();
    }
}



