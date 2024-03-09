<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\services\Orders\Models\Order;
use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Ykassa\YkassaService;
use App\Services\Payments\PaymentService;
use App\Services\Payments\database\Models\Payment;
use App\Services\Ykassa\App\Events\DTO\PaymentCancelData;
use App\Services\Ykassa\App\Events\PaymentCancelEvent;

class YoukassaController extends Controller
{
    public function cancel(
        
        Order $order,
        PaymentService $paymentService,

    )
    {

        //получаем платеж который в ожидании
        $payment = $paymentService
            ->getPayments()
            ->payable($order)
            ->status(PaymentStatusEnum::waiting_for_capture)
            ->findForPayable();

        $payment && event(new PaymentCancelEvent(
            PaymentCancelData::fromPayment($payment),
        ));
        
        //отменяем платеж через сервес payment
        $paymentService
            ->cancelPayment()
            ->run($payment);

       
       
        

        return redirect()->route('orders', $order->uuid);
    }

}
