<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\App\Events\DTO\PaymentCompletedData;
use App\Services\Payments\App\Events\PaymentCompletedEvent;
use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\Database\Models\Payment;



class CompletePaymentAction{



    public function run(Payment $payment): bool
    {

        $update = $payment->update(['status' => PaymentStatusEnum::completed]);
        
        //$update -> если обновился то бросаем событие 
        $update && event(new PaymentCompletedEvent(

            PaymentCompletedData::fromPayment($payment),

        ));

        return $update;
    }


}



