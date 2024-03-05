<?php

namespace App\Http\Controllers;

use App\Services\Payments\App\Requests\UpdatePaymentRequest;
use App\Services\Payments\database\Models\Payment;
use App\Services\Payments\PaymentService;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function checkout(Payment $payment, PaymentService $paymentService)
    {

        //вернуть все возможные методы, которые активны
        $methods = $paymentService
            ->getPaymentMethods()
            ->active(true)
            ->get();

        return view('payments.checkout', compact('payment', 'methods'));
    }

    public function method(
        UpdatePaymentRequest $request, 
        Payment $payment, 
        PaymentService $paymentService
    ) {

        //проверка статуса платежа если не pending - то 404
        $validated = $request->validated();
       
        //Возвращаем method через сервес payment
        $method = $paymentService
            ->getPaymentMethods()
            ->id($validated['method_id'])
            ->active(true)
            ->first();

        abort_unless($method, 404);

        //обновляем способ оплаты через сервес
        $paymentService
            ->updatePayment()
            ->method($method)
            ->run($payment);


        return redirect()->route('payments.process', $payment->uuid);
    }

    public function process(Payment $payment, PaymentService $PaymentService)
    {   
        // return 'Оплата выбранным способом:' . $payment->method->value;
        // return view("payments.drivers.{$payment->driver->value}", compact('payment'));

        //если вдруг у пользователя не выбрал метод оплаты и он попал на эту страницу
        // abort_unless($payment->method_id, 404);

        //получаем наш драйвер из сервеса
        $driver = $PaymentService->getDriver($payment->driver);

        //возваращем страничку нашего драйвера
        return $driver->view($payment);
    }

    //Тестовый способ оплаты
    public function complete(Payment $payment, PaymentService $paymentService)
    {
        $paymentService->completePayment()->run($payment);

        return redirect()->route('payments.success' , [
            'uuid' => $payment->uuid,
        ]); 
    }

    //Тестовый способ оплаты
    public function cancel(Payment $payment, PaymentService $paymentService)
    {
        $paymentService->cancelPayment()->run($payment);

        return redirect()->route('payments.failure' , [
            'uuid' => $payment->uuid,
        ]);
    }

    //Тестовый способ оплаты
    public function success(
        Request $request, 
        Payment $payment,
        PaymentService $paymentService,
    ) { 
        
        $uuid = $request->input('uuid');

        $payment = $paymentService
            ->getPayments()
            ->uuid($uuid)
            ->first();

        abort_unless($payment, 404);

        return view('payments.success', compact('payment'));
    }

    public function failure(
        Request $request, 
        Payment $payment,
        PaymentService $paymentService,
    ) {
        
        $uuid = $request->input('uuid');

        $payment = $paymentService
            ->getPayments()
            ->uuid($uuid)
            ->first();

        abort_unless($payment, 404);

        return view('payments.failure', compact('payment'));
    }
}
