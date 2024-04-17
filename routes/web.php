<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 2;
    return view('welcome');
});
