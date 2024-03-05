<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Database\Models\Payment;
use App\Services\Payments\Interface\PaymentDriverInterface;
use Illuminate\Contracts\View\View;

class TestPaymentDriver implements PaymentDriverInterface
{

   public function view(Payment $payment): View
   {
        return view('payments::test', compact('payment'));
   }

}