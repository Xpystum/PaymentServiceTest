<?php

namespace App\Services\Ykassa\App\Events\DTO;
use App\Services\Payments\Database\Models\Payment;

class PaymentCancelData
{

    public function __construct(

        public string  $paymentId,

    ) { }
    
    public static function fromPayment(Payment $payment): static
    {
        return new static(

            paymentId: $payment->driver_payment_id,

        );
    }

}
