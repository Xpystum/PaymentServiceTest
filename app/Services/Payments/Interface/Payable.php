<?php

namespace App\Services\Payments\Interface;

use app\Support\Values\AmountValue;

//Интерфейс оплаты
interface Payable
{

    public function getPayableCurrencyId(): string;
    public function getPayableAmount(): AmountValue;
    public function getPayableType(): string;
    public function getPayableId(): int;

}