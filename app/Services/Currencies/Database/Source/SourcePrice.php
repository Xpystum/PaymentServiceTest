<?php

namespace App\Services\Currencies\Database\Source;

use App\Support\Values\AmountValue;

class SourcePrice
{
    public function __construct(
        public string $currency,
        public AmountValue $value,
    ) { }

}
