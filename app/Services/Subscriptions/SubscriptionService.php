<?php

namespace App\Services\Subscriptions;

use App\Services\Subscriptions\App\Actions\GetSubscriptionsAction;
use App\Services\Subscriptions\App\Actions\CreateSubscriptionAction;

class SubscriptionService
{

    public function createSubscription(): CreateSubscriptionAction
    {
        
        return new CreateSubscriptionAction;
    }

    public function getSubscription(): GetSubscriptionsAction
    {
        return new GetSubscriptionsAction();
    }
}
