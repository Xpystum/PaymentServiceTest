<?php

namespace App\Services\Ykassa\App\Actions;

use App\Services\Ykassa\Database\Enums\PaymentStatusEnum;
use App\Services\Ykassa\App\Actions\AbstractPaymentAction;
use App\Services\Ykassa\App\Actions\DTO\CreatePaymentData;
use App\Services\Ykassa\App\Actions\DTO\Entity\PaymentEntity;

class CreatePaymentAction extends AbstractPaymentAction
{


    public function run(CreatePaymentData $data): PaymentEntity
    {

        try {

            $response = $this->clientSDK->createPayment(
    
                array(
    
                    'amount' => array(
                        'value' => $data->value,
                        'currency' => $data->currency,
                    ),
    
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => $data->returnUrl,
                    ),
    
                    'metadata' => array(
                        'order_id' => $data->idempotenceKey
                    ),
    
                    'capture' => $data->capture,
                    'description' => $data->description,
    
                ),
    
                $data->idempotenceKey
            );

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
