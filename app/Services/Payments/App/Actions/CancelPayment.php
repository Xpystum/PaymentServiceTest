<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\Database\Models\Payment;
use App\Services\Payments\Database\Models\PaymentMethod;


class CancelPayment{


    public function run(Payment $payment): bool
    {
        $payment->status = PaymentStatusEnum::cancelled;

        return $payment->save();
    }


}



