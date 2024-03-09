<?php

namespace App\Services\Ykassa\App\Listeners;

use Exception;
use App\Services\Ykassa\YkassaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Ykassa\App\Events\PaymentCancelEvent;

class CancelPaymentListener implements ShouldQueue
{

    public function __construct(

        private YkassaService $ykassaService,

    ) { }
   

    public function handle(

        PaymentCancelEvent $event,

    ): void {

        //получаем dto платежа юкассы
        $paymentYkassa = $this->ykassaService
            ->FindPayment($event->data->paymentId);
    
        if(isset($paymentYkassa)){

            //отменяем платеж у юкассы (возврат средств) <- нужно вынести как событие или в job
            $this->ykassaService
            ->CancelPayment($paymentYkassa);

        } else {

            throw new Exception('Ошибка отмены платежа в event y Ykassa');

        }
        
    }
}
