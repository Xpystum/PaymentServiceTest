<?php

namespace App\services\Orders\Models;

use App\Services\Currencies\Models\Currency;
use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Payments\Models\Payment;
use App\Support\Values\AmountValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property int $id
 * 
 * @property string $uuid
 * 
 * @property Carbon $created_at
 * 
 * @property Carbon $updated_at
 * 
 * @property OrderStatusEnum $status
 * 
 * @property string $currency_id
 * 
 * @property AmountValue $amount
 */


class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'status', 

        'currency_id', 'amount'

    ];

    protected $casts = [

        'status' => OrderStatusEnum::class, 

        'amount' => AmountValue::class ,
        
    ];
    
    public function Payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'payabel');
    }

    
}
 