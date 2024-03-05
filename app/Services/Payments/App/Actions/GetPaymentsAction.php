<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Models\Payment;



class GetPaymentsAction{

    private string|null $uuid = null;

    public function uuid(string $uuid) :static
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function first(): Payment|null
    {   
        $query = Payment::query();

        if( !is_null($this->uuid) )
        {
            $query->where('uuid', $this->uuid);
        }
        
        return $query->first();
    }


}



