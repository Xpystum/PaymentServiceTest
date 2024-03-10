<?php

namespace App\Services\Currencies\Database\Models;

use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use app\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @property string $id
 * 
 * @property string $name
 * 
 * @property AmountValue $price
 * 
 * @property SourceEnum $source
 */
class Currency extends Model
{
    use HasFactory;

    public const RUB = 'RUB';
    public const USD = 'USD';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id', 'name',

        'price', 'source'
    ];

    protected $casts = [

        'source' => SourceEnum::class,

        'price' => AmountValue::class

    ];

}
