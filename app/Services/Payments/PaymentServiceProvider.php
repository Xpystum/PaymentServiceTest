<?php

namespace App\Services\Payments;

use App\Services\Payments\App\Commands\InstallPaymentsCommand;
use Illuminate\Support\ServiceProvider;


class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //указываем где у нас лежат view нашего сервеса
        $this->loadViewsFrom( __DIR__ . '/Resources/Views', 'payments');
        //указываем laravel что бы он скопировал наши view к себе во фреймворк (мы можем менять наши виды не затрагивая их в нашем сервесе)
        $this->publishes([
            __DIR__."/Resources/Views" => resource_path('views/vendor/payments')
        ], 'payments');

        if($this->app->runningInConsole()){

            $this->loadMigrationsFrom( __DIR__ . '/Database' . '/Migrations');

            $this->commands([
                InstallPaymentsCommand::class,
            ]);
            
        }

    }
}
