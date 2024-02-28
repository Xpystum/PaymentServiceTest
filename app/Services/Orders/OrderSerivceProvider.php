<?php

namespace App\Services\Orders;

use App\services\Orders\Models\Order;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class OrderSerivceProvider extends ServiceProvider
{
   
    public function register(): void
    {
        //
    }

  
    public function boot(): void
    {
        Relation::enforceMorphMap([
            'order' => Order::class,
        ]);


        if($this->app->runningInConsole()){

            $this->loadMigrationsFrom(__DIR__ . '/Migrations');
            $this->commands([
                // InstallCurrenciesCommand::class,
            ]);

        }
    }
}
    