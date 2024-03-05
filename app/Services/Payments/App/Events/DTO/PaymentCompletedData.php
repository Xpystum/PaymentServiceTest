<?php

namespace App\Services\Payments\App\Events\DTO;

use App\Services\Payments\Database\Models\Payment;

readonly class PaymentCompletedData
{

    public function __construct(

        public string  $uuid,

        public string  $payableType, //order, tinkoff, ykassa

        public string  $payableId, //order, tinkoff, ykassa

    ){ }
    
    
    //таким способом можно не вызывать создание экземпляра из вне
    public static function fromPayment(Payment $payment): static
    {
        return new static(
            uuid: $payment->uuid,

            payableType: $payment->payable_type,

            payableId: $payment->payable_id,
        );
    }

}
