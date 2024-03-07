<?php

namespace App\Services\Ykassa\App\Actions;

use YooKassa\Client;
use App\Services\Ykassa\YkassaService;
use App\Services\Ykassa\App\Exceptions\YkassaExceptions;

abstract class AbstractPaymentAction
{

    protected Client|null $clientSDK = null;
    protected YkassaService|null $ykassa = null;


    // protected =) ?
    public function __construct(YkassaService $ykassa) { 

        $this->ykassa = $ykassa;
        $this->clientSDK = $ykassa->getClientSdk(); 
    }

    public static function make(YkassaService $ykassa): static
    {
        return new static($ykassa);
    }

    public function error(\Throwable $error)
    {
        logger('Критическая Ошибка:', ['error' => $error]);
        throw new YkassaExceptions("Критическая Ошибка: {$error->getMessage()}");
    }


}
