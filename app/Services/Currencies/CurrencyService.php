<?php

namespace App\Services\Currencies;

use App\Services\Currencies\App\Actions\UpdateCurrenciesPricesAction;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use App\Services\Currencies\Database\Source\Factories\SourceFactory;
use App\Services\Currencies\Database\Source\Interface\Source;

class CurrencyService
{

    /**
     * @param SourceEnum $source
     * 
     * @return Source
     */
    public function getSource(SourceEnum $source): Source
    {
        return SourceFactory::make($source);
    }

    /**
     * @param Source $args
     * 
     * @return UpdateCurrenciesPricesAction
     */
    public function updatePrices(): UpdateCurrenciesPricesAction
    {
        return app(UpdateCurrenciesPricesAction::class);
    }
}
