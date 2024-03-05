<?php

namespace App\Services\Payments\Database\Enums;

enum PaymentDriverEnum: string
{
    case test = 'test';

    public function name(): string
    {
        return match($this){

            self::test => 'Тестовый провайдер',

        };
    }

    private function is(PaymentDriverEnum $status): bool
    {
        return $this === $status;
    }

    public function isTest(): bool
    {
        return $this->is(PaymentDriverEnum::test);
    }

    

}