<?php

namespace App\Services\Ykassa\App\Actions;

use App\Services\Ykassa\Database\Enums\PaymentStatusEnum;
use App\Services\Ykassa\App\Actions\AbstractPaymentAction;
use App\Services\Ykassa\App\Actions\DTO\Entity\PaymentEntity;

class GetPaymentAction extends AbstractPaymentAction
{

    public function run(string $paymentId): PaymentEntity
    {

        try {

            $response = $this->clientSDK->getPaymentInfo($paymentId);

        } catch (\Throwable $error) {

            $this->error($error);
            
        }

       
        return new PaymentEntity(

            id: $response->getId(),

            status: PaymentStatusEnum::from($response->getStatus()),

            paid: $response->getPaid(),

            value: $response->getAmount()->getValue(),

            url: $response->getConfirmation()->getConfirmationUrl(),

            order_uuid: $response->getMetadata()->order_id

        );

    }

}
