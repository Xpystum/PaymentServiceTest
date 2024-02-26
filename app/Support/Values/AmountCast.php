<?php

namespace App\Support\Values;

use App\Support\Values\AmountValue;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class AmountCast implements CastsAttributes
{
    
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return new AmountValue($value);
    }


    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if($value instanceof AmountValue){

            return $value->value();

        }

        throw new InvalidArgumentException(
            'Value must be instance of AmountValue',
        );
        
    }
}
