<?php

namespace App\Services\Payments\Database\Models;

use App\Services\Payments\database\Enums\PaymentDriverEnum;
use App\Services\Payments\database\Enums\PaymentStatusEnum;
use App\Services\Payments\Interface\Payable;
use App\Support\Values\AmountValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
/**
 * @property int $id
 * 
 * @property string $uuid
 * 
 * @property Carbon $created_at
 * 
 * @property Carbon $updated_at
 * 
 * @property PaymentStatusEnum $status
 * 
 * @property AmountValue $amount
 * 
 * @property string $payable_type
 * 
 * @property Payable $payable
 * 
 * @property string $currency_id
 * 
 * @property int $payable_id
 * 
 * @property int $method_id
 * 
 * @property PaymentMethod $method_id
 * 
 * @property PaymentDriverEnum|null $driver
 * 
 * @property string|null $driver_payment_id
 * 
 * @property string|null $driver_currency_id
 * 
 * @property AmountValue|null $driver_amount
 */
class Payment extends Model
{   
    
    use HasFactory;

    protected $fillable = [

        'uuid',

        'status',

        'currency_id', 'amount',

        'payable_type', 'payable_id',

        'method_id',


        'driver' , 

        'driver_payment_id', 
        
        'driver_currency_id',

        'driver_amount'


    ];

    protected $casts = [

        'status' => PaymentStatusEnum::class,

        'amount' => AmountValue::class,

        'driver_amount' => AmountValue::class,

        'driver' => PaymentDriverEnum::class,

    ];

    public function payable() : MorphTo
    {

        return $this->morphTo();
    }

    public function method() : BelongsTo
    {

        return $this->BelongsTo(PaymentMethod::class);
    }

   
}
