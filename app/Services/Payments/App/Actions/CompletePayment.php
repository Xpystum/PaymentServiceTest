<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\Database\Models\Payment;



class CompletePayment{



    public function run(Payment $payment): bool
    {
        $payment->status = PaymentStatusEnum::completed;

        return $payment->save();
    }


}



