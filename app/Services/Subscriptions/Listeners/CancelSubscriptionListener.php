<?php

namespace App\Services\Subscriptions\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Payments\App\Events\PaymentCancelEvent;
use App\Services\Subscriptions\Database\Models\Subscription;
use App\Services\Subscriptions\Database\Enums\SubscriptionStatusEnum;

class CancelSubscriptionListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(PaymentCancelEvent $event): void
    {
        $payableType = $event->data->payableType;
        $payableId = $event->data->payableId;

        if($payableType !== (new Subscription())->getPayableType()){
            return;
        }

        $subscription = Subscription::query()
            ->find($payableId);

        if(is_null($subscription))
        {
            return;
        }

        $subscription->update(['status' => SubscriptionStatusEnum::cancelled]);
    
    }
}
