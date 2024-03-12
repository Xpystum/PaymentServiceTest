<?php

namespace App\Services\Currencies\App\Actions;

use App\Services\Currencies\Database\Models\Currency;
use app\Support\Values\AmountValue;

class ConvertCurrencyAction
{

    
    private string $from; //Пример из Валюты RUB ->

    private string $to; //В валюту USD - EUR и т.д

    public function from(string $from): static
    {
        $this->from = $from;

        return $this;
    }

    public function to(string $to): static
    {
        $this->to = $to;

        return $this;
    }


    public function run(AmountValue $amount): AmountValue
    {

        $currencies = Currency::getCached();

        $from = $currencies->firstWhere('id' , $this->from);

        $to = $currencies->firstWhere('id' , $this->to);
        

        if($from->isNotMain()){

            // $amount = new AmountValue($amount->value() * $from->price->value()); 
            $amount = $amount->mul($from->price, 8);

        }
        
        $result = $amount->div($to->price, 8);

        return new AmountValue($result);
    }
}
