<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\App\Actions\Traits\ActionHelperTrait;
use App\Services\Payments\database\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Collection;


class GetPaymentMethodsAction{

    use ActionHelperTrait;

    public function run(): Collection
    {
        
        $query = PaymentMethod::query();

        if( !is_null($this->active) ){

            $query->where('active', $this->active);

        }

        //Вернуть все способы оплаты где action = true
        return $query->get();
    }


}



