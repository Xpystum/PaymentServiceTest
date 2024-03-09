<?php

namespace App\Services\Payments\Database\Enums;

enum PaymentStatusEnum: string
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

    private function is(PaymentStatusEnum $status): bool
    {

        return $this === $status;
    }

    public function isPending(): bool
    {
        
        return $this->is(PaymentStatusEnum::pending);
    }

    public function isWaiting(): bool
    {
        
        return $this->is(PaymentStatusEnum::waiting_for_capture);
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