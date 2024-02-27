<?php

namespace App\Services\Payments\Enums;

enum PaymentDriverEnum: string
{
    case test = 'test';

    public function name(): string
    {
        return match($this){

            self::test => 'Тестовый провайдер',

        };
    }

}