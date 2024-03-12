<?php

namespace App\Http\Controllers;

use App\Services\Currencies\CurrencyService;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use App\Services\Currencies\Database\Source\SourcePrice;
use App\Support\Values\AmountValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function __invoke()
    {
        
        $service = new CurrencyService;

        $data = $service->convert()
                    ->from('USD')
                    ->to('RUB')
                    ->run(new AmountValue(11.01936874));
 
        dd($data);
        
        // $source = $service->getSource(SourceEnum::cbrf);
        // $data = $service->updatePrices()->run($source);



        // dd(Str::replace('-', '/', $date));

        // dd($response);

        // $PaymentEntity = $ykassa->createPayment(

        //     new CreatePaymentData(
                
        //         value: 123,
        //         currency: 'RUB',
        //         capture: false,
        //         idempotenceKey: (string) Str::uuid(),
        //         returnUrl: 'https://example.com/callback',

        //     )

        // );


        // $PaymentEntity = $ykassa->FindPayment($PaymentEntity->id);
        // $PaymentEntity = $ykassa->CancelPayment($PaymentEntity);
        // dd($PaymentEntity);
        
        // $PaymentEntity = $ykassa->CancelPayment($PaymentEntity);

        // return 2;

    }
}
