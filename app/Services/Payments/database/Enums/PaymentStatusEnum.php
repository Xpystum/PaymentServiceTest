<?php

namespace App\Services\Payments\Database\Enums;

enum PaymentStatusEnum: string
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

    private function is(PaymentStatusEnum $status): bool
    {

        return $this === $status;
    }

    public function isPending(): bool
    {
        
        return $this->is(PaymentStatusEnum::pending);
    }

    public function isCompleted(): bool
    {
        
        return $this->is(PaymentStatusEnum::completed);
    }

    public function isCancelled(): bool
    {
        
        return $this->is(PaymentStatusEnum::cancelled);
    }

}