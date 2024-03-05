<?php

namespace App\Services\Payments\Interface;

use app\Support\Values\AmountValue;
use DragonCode\Support\Facades\Http\Url;

//Интерфейс оплаты
interface Payable
{

    public function getPayableName(): string;
    public function getPayableCurrencyId(): string;
    public function getPayableAmount(): AmountValue;
    public function getPayableType(): string;   
    public function getPayableId(): int;
    public function getPayableUrl(): string;

}