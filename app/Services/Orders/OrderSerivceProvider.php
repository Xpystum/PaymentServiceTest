<?php

namespace App\Services\Orders;

use App\services\Orders\Models\Order;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Services\Orders\Commands\InstallOrdersCommand;
use App\Services\Orders\Listeners\CancelOrderListener;
use App\Services\Orders\Listeners\WaitingOrderListener;
use App\Services\Orders\Listeners\CompleteOrderListener;
use App\Services\Payments\App\Events\PaymentCancelEvent;
use App\Services\Payments\App\Events\PaymentWaitingEvent;
use App\Services\Payments\App\Events\PaymentCompletedEvent;

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

        Event::listen(PaymentCompletedEvent::class, CompleteOrderListener::class);
        Event::listen(PaymentCancelEvent::class, CancelOrderListener::class);
        Event::listen(PaymentWaitingEvent::class, WaitingOrderListener::class);
    }
}
    