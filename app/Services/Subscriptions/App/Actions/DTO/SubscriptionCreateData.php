<?php

namespace App\Services\Subscriptions\App\Actions\DTO;

readonly class SubscriptionCreateData
{

    public function __construct(

        public string  $uuid,

        public string  $payableType, //order, tinkoff, ykassa

        public string  $payableId, //order, tinkoff, ykassa

    ) { }

    
}


