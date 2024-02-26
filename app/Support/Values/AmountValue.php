<?php
namespace app\Support\Values;

use App\Support\Values\AmountCast;
use Illuminate\Contracts\Database\Eloquent\Castable;
use InvalidArgumentException;

class AmountValue implements Castable
{
    private string $value; //123.45

    public function __construct(string $value)
    {
        if(!is_numeric($value)){

            throw new InvalidArgumentException(
                'Invalid amount value: ' . $value,
            );
        }
   
        $this->value = $value;
        
    }

    public function value(): string
    {
        return $this->value;
    } 

    public static function castUsing(array $arguments)
    {
        return AmountCast::class;
    }

    public function __toString()
    {
        return $this->value();
    }
}