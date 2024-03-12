<?php

namespace App\Services\Currencies\App\Actions;

use App\Services\Currencies\Database\Models\Currency;
use App\Services\Currencies\Database\Source\Exseptions\SourceException;
use App\Services\Currencies\Database\Source\Interface\Source;
use Illuminate\Database\Eloquent\Collection;

class UpdateCurrenciesPricesAction
{
    public function run(Source $source): Collection
    {   

        $currencies = Currency::query()
            ->where('source' , $source->enum()->value)
            ->get();


        if($currencies->isEmpty())
        {
            return $currencies;
        }

        $prices = $source->getPrices();
        

        if($prices->isEmpty())
        {
            return $currencies;
        }

        foreach($currencies as $currency){


            //сверяет есть ли у нас такая валюта в бд
            $price = $prices->firstWhere('currency' , $currency->id);

            if($price)
            {
                //обновляем цену валюту за 1 единицу с API ЦБ РФ
                $currency->update(
                [
                    'price' => $price->value,
                ]);

            }else{

                //Кидаем исключение на несуществование валюты в нашей бд
                throw new SourceException('Не удалось получить валюту' . $currency->id);

            }

        }

        return $currencies;
    }
}
