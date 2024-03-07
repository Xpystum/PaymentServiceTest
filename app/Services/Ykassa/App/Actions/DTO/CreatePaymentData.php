<?php

namespace App\Services\Ykassa\App\Actions\DTO;

use app\Support\Values\AmountValue;
use Symfony\Component\Console\Descriptor\Descriptor;

class CreatePaymentData
{

    public function __construct(

        public int $value,

        public string $currency,

        public bool $capture,
  
        public string $idempotenceKey, // orderUuid?

        public string $returnUrl,

        // public string $faileUrl,

        public string $description = '',


    ) { }

}
