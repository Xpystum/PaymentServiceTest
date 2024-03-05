<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/orders', 301)->name('home');



Route::controller(OrderController::class)->whereUuid('order')
    ->group(function() {

    Route::get('/orders',  'index')->name('orders');

    Route::get('/orders/{order:uuid}', 'show')->name('orders.show');

    Route::post('/orders/{order:uuid}/payment', 'payment')->name('orders.payment');

}); 

Route::controller(PaymentController::class)->whereUuid('order')
    ->group(function() {

    Route::get('/payments/{payment:uuid}/checkout', 'checkout')->name('payments.checkout');

    Route::middleware('IsStatusPayment')->group(function (){

        Route::post('/payments/{payment:uuid}/method', 'method')->name('payments.method');

        Route::get('/payments/{payment:uuid}/process', 'process')->name('payments.process');

        Route::post('/payments/{payment:uuid}/complete', 'complete')
            ->middleware('IsProduction')
            ->middleware('IsDriverTest')
            ->name('payments.complete');

        Route::post('/payments/{payment:uuid}/cancel', 'cancel')
            ->middleware('IsProduction')
            ->middleware('IsDriverTest')
            ->name('payments.cancel');

    });

    //некоторые способы оплаты например тинькофф не могут обратно передать {payment:uuid} -> uuid платежа, поэтому надо убирать, или получится не универсально
    Route::get('/payments/success', 'success')
        ->middleware('IsUuid')
        ->name('payments.success');

        //некоторые способы оплаты например тинькофф не могут обратно передать {payment:uuid} -> uuid платежа, поэтому надо убирать, или получится не универсально
    Route::get('/payments/failure', 'failure')
        ->middleware('IsUuid')
        ->name('payments.failure');

});






