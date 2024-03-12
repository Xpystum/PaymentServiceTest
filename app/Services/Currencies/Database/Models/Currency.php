<?php

namespace App\Services\Currencies\Database\Models;

use app\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;

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

    public const MAIN = 'RUB';

    public const RUB = 'RUB';
    public const USD = 'USD';
    public const EUR = 'EUR';

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

    public function isMain(): bool
    {
        return $this->id === static::MAIN;
    }

    public function isNotMain(): bool
    {
        return !$this->isMain();
    }

    /**
     * @return Collection
     */
    public static function getCached(): Collection
    {

        static $cached;

        if($cached)
        {
            return $cached;
        }

        return $cached = static::all();
    }

}
