<?php

namespace App\Services\Orders\Enums;

enum OrderStatusEnum: string
{
    case pending = 'pending';

    case waiting_for_capture = 'waiting_for_capture';

    case completed = 'completed';

    case cancelled = 'cancelled';

    public function name(): string
    {
        return match($this){

            self::pending => 'Ожидает',

            self::waiting_for_capture => 'Ожидает Подтверждение',

            self::completed => 'Завершено',

            self::cancelled => 'Отмененa',

        };
    }

    public function color(): string
    {
        return match($this){

            self::pending => 'warning',

            self::waiting_for_capture => 'info',

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

    public function isWaiting() : bool
    {
        return $this->is(self::waiting_for_capture);
    }

}