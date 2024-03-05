<?php

namespace App\Services\Subscriptions\Database\Enums;


enum SubscriptionStatusEnum: string
{

    case pending = 'pending';

    case active = 'completed';

    case cancelled = 'canceleted';

    public function name(): string
    {
        return match($this){

            self::pending => 'Ожидает',

            self::active => 'Активаная',

            self::cancelled => 'Отменено',

        };
    }

    public function color(): string
    {
        return match($this){

            self::pending => 'warning',

            self::active => 'success',

            self::cancelled => 'danger',

        };
    }

    public function is(SubscriptionStatusEnum $orderStatusEnum)
    {
        return $this === $orderStatusEnum;
    }

    public function isPending() : bool
    {
        return $this->is(self::pending);
    }

    public function isActive() : bool
    {
        return $this->is(self::active);
    }

    public function isCancelled() : bool
    {
        return $this->is(self::cancelled);
    }

}
