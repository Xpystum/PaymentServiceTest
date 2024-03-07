<?php

namespace App\Services\Ykassa\App\Actions\DTO\Entity;

use App\Services\Ykassa\Database\Enums\PaymentStatusEnum;
use app\Support\Values\AmountValue;

class PaymentEntity
{

    public function __construct(

        public string $id,

        public PaymentStatusEnum $status,

        public bool $paid,

        public int $value,

        public string $url,
        
        public string $order_uuid,

        // public string $confirmation_url,

        // public string $currency,

        // public string $acount_id,

        // public string $gateway_id,

        // public string $created_at,

        // public bool $paid,

        // public bool $refundable,

    ) { }
}
