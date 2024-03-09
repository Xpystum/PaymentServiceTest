<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Payments\Callbacks\YoukassaController;


Route::controller(YoukassaController::class)->group(function ()  {

    Route::post('payments/ykassa/callbacks', 'callback')->name('payments.ykassa.callbacks');

});

