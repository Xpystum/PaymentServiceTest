<?php

namespace App\Services\Currencies\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * 
 * @property string $id
 * @property string $name
 */
class Currency extends Model
{
    use HasFactory;

    public const RUB = 'RUB';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id', 'name'
    ];

}
