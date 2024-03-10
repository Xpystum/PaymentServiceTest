<?php

namespace App\Services\Currencies;

use App\Services\Currencies\App\Commands\InstallCurrenciesCommand;
use App\Services\Currencies\App\Commands\UpdateCurrencyPricesCommand;
use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       
        if($this->app->runningInConsole()){

            $this->loadMigrationsFrom(__DIR__ . '\Database\Migrations');

            info('путь ' . __DIR__. '\Database\Migrations');

            $this->commands([
                InstallCurrenciesCommand::class,
                UpdateCurrencyPricesCommand::class,
            ]);

        }

    }
}
