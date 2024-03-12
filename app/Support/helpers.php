<?php

use app\Support\Values\AmountValue;
use App\Services\Currencies\CurrencyService;
use App\Services\Currencies\Database\Models\Currency;

if( !function_exists('currency') ){

    function currency(): string
    {

        return session('currency', Currency::MAIN);
    }
    
}

if( !function_exists('convert') ){

    function convert(AmountValue $amount): AmountValue
    {

        /** @var CurrencyService */
        $service = app(CurrencyService::class);

        return $service->convert()
                    ->from(Currency::MAIN)
                    ->to(currency())
                    ->run(new AmountValue($amount));
                    
       
    }
    
}

if( !function_exists('money') ){

    function money(AmountValue $amount, string $currency): string
    {
        $amount = $amount->add(new AmountValue(0), 2);
        return "{$amount} {$currency}";
    }
    
}