<?php

namespace App\Services\Ykassa;

use YooKassa\Client;
use App\Services\Ykassa\App\Actions\GetPaymentAction;
use App\Services\Ykassa\App\Actions\CancelPaymentAction;
use App\Services\Ykassa\App\Actions\CheckCallbackAction;
use App\Services\Ykassa\App\Actions\CreatePaymentAction;
use App\Services\Ykassa\App\Actions\DTO\CreatePaymentData;
use App\Services\Ykassa\App\Actions\DTO\Entity\PaymentEntity;

class YkassaService
{
    
    private Client|null $clientSDK = null;

    public function __construct(

        public YkassaConfig $config

    ) { 
        
        //создаём экземпляр класса SKD Ykassa
        $this->clientSDK = new Client();

        //Устанавливаем нашу авторизацию по config
        $this->clientSDK->setAuth($this->config->shopId, $this->config->key);

    }

    public function getClientSdk() : Client
    {
        return $this->clientSDK;
    }

    public function createPayment(CreatePaymentData $data): PaymentEntity
    {

        return CreatePaymentAction::make($this)->run($data);
    }

    public function FindPayment(string $paymentId) : PaymentEntity
    {
        
        return GetPaymentAction::make($this)->run($paymentId);
        
    }


    //отмена платежа только   в состоянии waiting_for_capture
    public function CancelPayment(PaymentEntity $PaymentEntity) : ?PaymentEntity
    {
        //отмена платежа в состоянии waiting_for_capture
        return CancelPaymentAction::make($this)->run($PaymentEntity);
        
    }

    public function checkCallback(array $data) : ?PaymentEntity
    {
        return CheckCallbackAction::make($this)->run($data);
    }

}
