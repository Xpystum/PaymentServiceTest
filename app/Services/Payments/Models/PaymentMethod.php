<?php

namespace App\Services\Payments\Models;

use App\Services\Payments\Enums\PaymentDriverEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * 
 * @property Carbon $created_at
 * 
 * @property Carbon $updated_at
 * 
 * @property string $name
 * 
 * @property boolean $active
 * 
 * @property PaymentDriverEnum $drive
 * 
 *
 */
class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
 
        'name', 'active',

        'driver',
      
    ];

    protected $casts = [

        'active' => 'boolean',

        'driver' => PaymentDriverEnum::class,
      
    ];


}
