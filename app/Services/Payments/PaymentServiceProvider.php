<?php

namespace App\Services\Payments;

use App\Services\Payments\Commands\InstallPaymentsCommand;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
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
                InstallPaymentsCommand::class,
            ]);
            
        }

    }
}
