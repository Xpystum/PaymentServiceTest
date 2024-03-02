<?php

namespace App\Http\Controllers;

use App\Services\Payments\Models\Payment;
use App\Services\Payments\PaymentService;
use App\Services\Payments\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    public function checkout(Payment $payment, PaymentService $paymentService)
    {

        // $methods = PaymentMethod::query()
        //     ->where('active', true)
        //     ->get();

        //вернуть все возможные методы, которые активны
        $methods = $paymentService
            ->getPaymentMethods()
            ->active(true)
            ->run();

        return view('payments.checkout', compact('payment', 'methods'));
    }

    public function method(
        UpdatePaymentRequest $request, 
        Payment $payment, 
        PaymentService $paymentService
    ) {

        
        //проверка статуса платежа если не panding - то 404
        abort_unless($payment->status->isPending(), 404);
        $validated = $request->validated();

       
       
        //Возвращаем method через сервес payment
        $method = $paymentService->
            findPaymentMethod()
            ->id($validated['method_id'])
            ->active(true)
            ->run();

        
        //обновляем способ оплаты через сервес
        $paymentService
            ->updatePayment()
            ->method($method)
            ->run($payment);



        return redirect()->route('payments.process', $payment->uuid);
    }

    public function process(Payment $payment)
    {
        abort_unless($payment->status->isPending(), 404);

        return 'Оплата выбранным способом:' . $payment->method->name;
    }
}
