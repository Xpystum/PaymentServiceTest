<?php

namespace App\Services\Orders\Factories;

use App\Services\Currencies\Models\Currency;
use App\Services\Orders\Enums\OrderStatusEnum;
use App\services\Orders\Models\Order;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\services\Orders\Models\Order>
 */
class OrderFactory extends Factory
{
   
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            
            'uuid' => $this->faker->uuid(),

            'status' => OrderStatusEnum::pending,

            'currency_id' => Currency::RUB,

            'amount' => new AmountValue($this->faker->randomFloat(2, 1, 100000)),

        ];
    }
}
