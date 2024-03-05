<?php

namespace App\Services\Orders\Enums;

enum OrderStatusEnum: string
{
    case pending = 'pending';

    case completed = 'completed';

    case cancelled = 'cancelled';

    public function name(): string
    {
        return match($this){

            self::pending => 'Ожидает',

            self::completed => 'Завершено',

            self::cancelled => 'Отменено',

        };
    }

    public function color(): string
    {
        return match($this){

            self::pending => 'warning',

            self::completed => 'success',

            self::cancelled => 'danger',

        };
    }

    public function is(OrderStatusEnum $orderStatusEnum)
    {
        return $this === $orderStatusEnum;
    }

    public function isPending() : bool
    {
        return $this->is(self::pending);
    }

    public function isCompleted() : bool
    {
        return $this->is(self::completed);
    }

    public function isCancelled() : bool
    {
        return $this->is(self::cancelled);
    }

}