<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Models\Payment;
use App\Services\Payments\App\Events\PaymentWaitingEvent;
use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\App\Events\DTO\PaymentWaitingData;



class WaitingPaymentAction{


    public function run(Payment $payment): bool
    {
        
        $update = $payment->update(['status' => PaymentStatusEnum::waiting_for_capture]);
        // $update -> если обновился то бросаем событие 
        $update && event(new PaymentWaitingEvent(

            PaymentWaitingData::fromPayment($payment),

        ));
        return $update;
    }


}



