<?php

namespace App\Services\Payments\Models;

use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Enums\PaymentStatusEnum;
use app\Support\Values\AmountValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * @property int $payable_id
 * 
 * @property int $method_id
 * 
 * @property PaymentDriverEnum $driver
 */
class Payment extends Model
{   
    
    use HasFactory;

    protected $fillable = [

        'status',

        'currency_id', 'amount',

        'payable_type', 'payable_id',

        'method_id',

        'drive',

    ];

    protected $casts = [

        'status' => PaymentStatusEnum::class,

        'amount' => AmountValue::class,

        'drive'=> PaymentDriverEnum::class,

    ];
    public function payable() : MorphTo
    {

        return $this->morphTo();
    }

   
}