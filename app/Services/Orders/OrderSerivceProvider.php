<?php

namespace App\Services\Orders;

use App\Services\Orders\Commands\InstallOrdersCommand;
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
            //наполнением таблицы заказами
            // (new OrderFactory)->count(100)->create();
            $this->loadMigrationsFrom(__DIR__ . '/Migrations');
            $this->commands([
                InstallOrdersCommand::class,
            ]);

        }
    }
}
    