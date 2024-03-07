<?php

namespace App\Services\Ykassa\App\Actions;

use App\Services\Ykassa\App\Exceptions\YkassaExceptions;
use App\Services\Ykassa\Database\Enums\PaymentStatusEnum;
use App\Services\Ykassa\App\Actions\AbstractPaymentAction;
use App\Services\Ykassa\App\Actions\DTO\Entity\PaymentEntity;

class CancelPaymentAction extends AbstractPaymentAction
{

    public function run(PaymentEntity $PaymentEntity): ?PaymentEntity
    {
        
        try {

            if($PaymentEntity->status === PaymentStatusEnum::waiting_for_capture)
            {
                
                $response = $this->clientSDK->cancelPayment(
                    $PaymentEntity->id,
                    $PaymentEntity->order_uuid,
                );
                
            }else{

                return null;
            }

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
