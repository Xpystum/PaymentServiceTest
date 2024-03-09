<?php

namespace App\Services\Payments\Database\Enums;

enum PaymentDriverEnum: string
{
    case test = 'test';

    case ykassa = 'ykassa';

    public function name(): string
    {
        return match($this){

            self::test => 'Тестовый провайдер',
            self::ykassa => 'Юкасса',

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