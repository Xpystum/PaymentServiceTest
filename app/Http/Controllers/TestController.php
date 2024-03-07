<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\Ykassa\YkassaConfig;
use App\Services\Ykassa\YkassaService;
use App\Services\Ykassa\App\Actions\DTO\CreatePaymentData;
use YooKassa\Model\Notification\NotificationEventType;

class TestController extends Controller
{
    public function __invoke()
    {
        $config = config('services.ykassa');

        $ykassa = new YkassaService(

            new YkassaConfig(
                key: $config['key'],
                shopId: $config['shopId'],
            )

        );

        $PaymentEntity = $ykassa->createPayment(

            new CreatePaymentData(
                
                value: 123,
                currency: 'RUB',
                capture: true,
                idempotenceKey: (string) Str::uuid(),
                returnUrl: 'https://example.com/callback',

            )

        );


        $PaymentEntity = $ykassa->FindPayment($PaymentEntity->id);


        dd($PaymentEntity);
        
        // $PaymentEntity = $ykassa->CancelPayment($PaymentEntity);

        // return 2;
        


    }
}
