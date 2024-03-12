<?php

namespace App\Http\Controllers;

use App\Services\Currencies\Database\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __invoke(Currency $currency)
    {
        session(['currency' => $currency->id]);

        return back();
    }
}
