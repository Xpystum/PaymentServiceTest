<?php

namespace App\services\Orders\Models;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Orders\OrderService;
use App\Services\Payments\database\Models\Payment;
use App\Services\Payments\Interface\Payable;
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


class Order extends Model implements Payable
{
    use HasFactory;

    protected $fillable = [

        'uuid',

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

    public function getPayableCurrencyId(): string
    {
        return $this->currency_id;
    }

    public function getPayableAmount(): AmountValue
    {

        return $this->amount;
    }

    public function getPayableType(): string
    {

        return $this->getMorphClass();
    }

    public function getPayableId(): int
    {
        return $this->id;
    }

    public function getPayableName(): string
    {
        return 'Заказ';
    }

    public function getPayableUrl(): string
    {
        return route('orders.show', $this->uuid);
    }
    
    public function onPaymentComplete(): void
    {

        (new OrderService)->completeOrder()->run($this);
    }

}
 