<?php

namespace App\Services\Ykassa\App\Actions;

use App\Services\Ykassa\Database\Enums\PaymentStatusEnum;
use App\Services\Ykassa\App\Actions\AbstractPaymentAction;
use App\Services\Ykassa\App\Actions\DTO\Entity\PaymentEntity;

use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\Notification\NotificationEventType;

class CheckCallbackAction extends AbstractPaymentAction
{

    public function run(array $data): ?PaymentEntity
    {
        ##TODO Проверить $data

        try {

            $source = file_get_contents('php://input');
            //получаем входящие параметры распарсиваем в json
            $data = json_decode($source, true);
    
            //создаём фабрику 
            $factory = new \YooKassa\Model\Notification\NotificationFactory();
    
            //в зависимоти от параметров собирается объект с помощью фабрики
            $notificationObject = $factory->factory($data);
    
            //получаем объект callbacka
            $responseObject = $notificationObject->getObject();
    
            $client = $this->clientSDK;
    
    
            //проверяем находится ли ip адресса, среди ip адрессов юмани (безопасность)
            if (!$client->isNotificationIPTrusted($_SERVER['REMOTE_ADDR'])) {
    
                //возвращаем 400 - если IP чужой
                return response('Something went wrong', 400);
                
            }
    
            if ($notificationObject->getEvent() === NotificationEventType::PAYMENT_SUCCEEDED) {
                $someData = [
                    'paymentId' => $responseObject->getId(),
                    'paymentStatus' => $responseObject->getStatus(),
                ];
    
              
            } elseif ($notificationObject->getEvent() === NotificationEventType::PAYMENT_WAITING_FOR_CAPTURE) {
                $someData = [
                    'paymentId' => $responseObject->getId(),
                    'paymentStatus' => $responseObject->getStatus(),
                ];
    
                
            } elseif ($notificationObject->getEvent() === NotificationEventType::PAYMENT_CANCELED) {
                $someData = [
                    'paymentId' => $responseObject->getId(),
                    'paymentStatus' => $responseObject->getStatus(),
                ];
                
    
            } elseif ($notificationObject->getEvent() === NotificationEventType::REFUND_SUCCEEDED) {
                $someData = [
                    'refundId' => $responseObject->getId(),
                    'refundStatus' => $responseObject->getStatus(),
                    'paymentId' => $responseObject->getPaymentId(),
                ];
    
            } else {
    
                return response('Something went wrong', 400);
    
            }
    
    
            // Получим актуальную информацию о платеже
            if ($response = $client->getPaymentInfo($someData['paymentId'])) {
    
                $paymentStatus = $response->getStatus();
    
                
            } else {
    
                return response('Something went wrong', 400);
    
            }
           
        } catch (\Throwable $error) {

            logger('Критическая Ошибка:', ['error' => $error->getMessage()]);
            return response('Something went wrong', 400);
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
