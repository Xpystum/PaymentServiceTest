<?php

namespace App\Services\Currencies\App\Commands;

use App\Services\Currencies\Database\Models\Currency;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use App\Support\Values\AmountValue;
use Illuminate\Console\Command;

class InstallCurrenciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Сервис для работы с валютами';

    public function handle()
    {
        $this->warn('Установка валют...');

        $this->installCurrencies();

        $this->info('Валюты установлены');
    }

    private function installCurrencies(): void
    {

        Currency::query()
            ->firstOrCreate(
                ['id' => Currency::RUB], 
                [
                    'name' => 'Рубль',
                    'price' => new AmountValue(1),
                    'source' => SourceEnum::manual
                ],
        );

        Currency::query()
            ->firstOrCreate(
                ['id' => Currency::USD]
                , 
                [
                    'name' => 'Доллар',
                    'price' => new AmountValue(100),
                    'source' => SourceEnum::cbrf
                ],
        );

        Currency::query()
        ->firstOrCreate(
            ['id' => Currency::EUR]
            , 
            [
                'name' => 'Евро',
                'price' => new AmountValue(110),
                'source' => SourceEnum::cbrf
            ],
    );
    }
}
