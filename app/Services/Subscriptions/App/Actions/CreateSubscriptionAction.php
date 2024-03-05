<?php

namespace App\Services\Subscriptions\App\Actions;

use App\Services\Subscriptions\Database\Models\Subscription;

class CreateSubscriptionAction
{

    private readonly int $id;
    
    public function id(int $id): static
    {
        
        $this->id = $id;

        return $this;

    }
    public function run()  //Subscription
    {  

       

        // return $payment;
    }

}
