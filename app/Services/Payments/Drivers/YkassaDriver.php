<?php

namespace App\Services\Payments\Drivers;

use Illuminate\Contracts\View\View;
use App\Services\Ykassa\YkassaService;
use App\Services\Payments\Database\Models\Payment;
use App\Services\Payments\Interface\PaymentDriverInterface;
use App\Services\Ykassa\App\Actions\DTO\CreatePaymentData;

class YkassaDriver implements PaymentDriverInterface
{
    public function __construct(

        private YkassaService $ykassaService,

    ) { }

    public function view(Payment $payment): View
    {
     
        $ykassaPayment = $this->ykassaService->createPayment(
            new CreatePaymentData(
                value: $payment->amount->value(),
                currency: $payment->currency_id,
                capture: false,
                idempotenceKey: $payment->uuid,
                returnUrl: route('payments.success', [ 'uuid' => $payment->uuid ]),
                description: "",
            )
        );

        $payment->update(['driver_payment_id' => $ykassaPayment->id]);

        $ykassaPaymentUrl = $ykassaPayment->url;

 
        return view('payments::ykassa', compact('ykassaPaymentUrl'));
    }
}
