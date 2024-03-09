<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Services\Ykassa\YkassaService;
use App\Services\Ykassa\App\Actions\DTO\CreatePaymentData;

class TestController extends Controller
{
    public function __invoke(YkassaService $ykassa)
    {
      

        $PaymentEntity = $ykassa->createPayment(

            new CreatePaymentData(
                
                value: 123,
                currency: 'RUB',
                capture: false,
                idempotenceKey: (string) Str::uuid(),
                returnUrl: 'https://example.com/callback',

            )

        );


        $PaymentEntity = $ykassa->FindPayment($PaymentEntity->id);
        $PaymentEntity = $ykassa->CancelPayment($PaymentEntity);
        dd($PaymentEntity);
        
       

        
        
        // $PaymentEntity = $ykassa->CancelPayment($PaymentEntity);

        // return 2;
        


    }
}
