<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\App\Events\DTO\PaymentCancelData;
use App\Services\Payments\App\Events\PaymentCancelEvent;
use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\Database\Models\Payment;



class CancelPaymentAction{


    public function run(Payment $payment): bool
    {
        $update = $payment->update(['status' => PaymentStatusEnum::cancelled]);

        $update && event(new PaymentCancelEvent(
            PaymentCancelData::fromPayment($payment),
        ));

        return $update;
    }


}



