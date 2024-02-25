<?php

namespace App\Services\Currencies;

use App\Services\Currencies\Commands\InstallCurrenciesCommand;
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

            $this->loadMigrationsFrom(__DIR__ . '/Migrations');
            $this->commands([
                InstallCurrenciesCommand::class,
            ]);

        }

       
    }
}
