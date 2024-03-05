<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\App\Actions\Traits\ActionHelperTrait;
use App\Services\Payments\Database\Models\PaymentMethod;
use ArgumentCountError;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


class GetPaymentMethodsAction{

    use ActionHelperTrait;

    private int|null $id = null;

    public function id(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    private function query(): Builder
    {
        $query = PaymentMethod::query();

        if( !is_null($this->active) ){

            $query->where('active', $this->active);

        }

        if( !is_null($this->id) )
        {
            $query->where('id', $this->id);
        }

        // }else{

        //     //выбивать исключение если нету id
        //     throw new ArgumentCountError(
        //         "Обязательный Аргумент id равен: [{$this->id}]"
        //     );
        // }

        return $query;
    }


    public function first(): PaymentMethod|null
    {
        return $this->query()->first();
    }

    public function get(): Collection|null
    {
        //Вернуть все способы оплаты где action = true
        return $this->query()->get();
    }


}



