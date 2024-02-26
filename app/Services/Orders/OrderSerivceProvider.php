<?php

namespace App\Services\Orders;

use Illuminate\Support\ServiceProvider;

class OrderSerivceProvider extends ServiceProvider
{
   
    public function register(): void
    {
        //
    }

  
    public function boot(): void
    {
        if($this->app->runningInConsole()){

            $this->loadMigrationsFrom(__DIR__ . '/Migrations');
            $this->commands([
                // InstallCurrenciesCommand::class,
            ]);

        }
    }
}
    