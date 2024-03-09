<?php

namespace App\Http\Controllers\Api\Payments\Callbacks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Payments\PaymentService;
use App\Services\Ykassa\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\database\Models\Payment;
use App\Services\Ykassa\YkassaService;

class YoukassaController extends Controller
{
    public function callback(
        
        Request $request, 
        PaymentService $paymentService,
        YkassaService $ykassaService,
        
        )
    {
        try {

            $entity = $ykassaService->checkCallback($request->all());
            $payment = $paymentService
                ->getPayments()
                ->uuid($entity->order_uuid)
                ->first();

           
            match ($entity->status)
            {

                PaymentStatusEnum::waiting_for_capture => $paymentService->waitingPayment()->run($payment),
            
                PaymentStatusEnum::succeeded  => $paymentService->completePayment()->run($payment),
            
                PaymentStatusEnum::canceled => $paymentService->cancelPayment()->run($payment),

                default => null,

            };

        } catch (\Throwable $error) {

            report($error);
            return response('Something went wrong', 400);

        }

        //по API SDK YKASSA нам нужно отправить ответ, что мы получили уведомление.
        return response('OK', 200);
        
    }
}
