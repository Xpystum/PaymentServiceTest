<?php

namespace App\Services\Currencies\App\Commands;

use App\Services\Currencies\CurrencyService;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use App\Services\Currencies\Database\Source\Interface\Source;
use Illuminate\Console\Command;

class UpdateCurrencyPricesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:prices {source}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление валют';

 
    
    public function handle(CurrencyService $service)
    {
        $this->warn('Идёт обновление курса валют...');
        $this->UpdatePrices($service);
        $this->info('Курсы валют обновлены.');
    }

    public function updatePrices(CurrencyService $service): void
    {
        /**
         * @var Source $source - параметр который мы получим из командной строки
         */
        $source = $service->getSource(
            SourceEnum::from($this->argument('source')),
        );

        $service->updatePrices()->run($source);
    }
}
