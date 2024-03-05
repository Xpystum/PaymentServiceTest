<?php

namespace App\Services\Payments\Interface;

use Illuminate\Contracts\View\View;
use App\Services\Payments\Database\Models\Payment;

interface PaymentDriverInterface 
{
    
    public function view(Payment $payment): View;

}
