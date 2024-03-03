<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\App\Actions\Traits\ActionHelperTrait;
use App\Services\Payments\database\Models\PaymentMethod;
use ArgumentCountError;


class FindPaymentMethodAction{

    private int|null $id = null;
  
    use ActionHelperTrait;

    public function id(int $id): static
    {
        $this->id = $id;

        return $this;
    }


    public function run(): PaymentMethod|null
    {
        
        $query = PaymentMethod::query();

        if( !is_null($this->active) ){

            $query->where('active', $this->active);

        }

        if( !is_null($this->id) )
        {
            $query->where('id', $this->id);

        }else{

            //выбивать исключение если нету id
            throw new ArgumentCountError(
                "Обязательный Аргумент id равен: [{$this->id}]"
            );
        }

        return $query->first();
        
    }


}



