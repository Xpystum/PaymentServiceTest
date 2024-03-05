<?php

namespace App\Services\Subscriptions;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Services\Payments\App\Events\PaymentCancelEvent;
use App\Services\Payments\App\Events\PaymentCompletedEvent;
use App\Services\Subscriptions\Database\Models\Subscription;
use App\Services\Subscriptions\Listeners\CancelSubscriptionListener;
use App\Services\Subscriptions\Listeners\ActivateSubscriptionListener;

class SubscriptioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {

        Relation::enforceMorphMap([

            'subscription' => Subscription::class,

        ]);

        Event::listen(PaymentCompletedEvent::class, ActivateSubscriptionListener::class);
        Event::listen(PaymentCancelEvent::class, CancelSubscriptionListener::class);

        if($this->app->runningInConsole()){

            
            $this->loadMigrationsFrom( __DIR__ . '/Database' . '/Migrations');


        }
    }
}
