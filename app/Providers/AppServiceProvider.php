<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;
use App\Adapters\CurrencyPaymentConvertorAdapter;
use App\Services\Currencies\Database\Models\Currency;
use App\Services\Payments\Interface\PaymentConverter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentConverter::class, CurrencyPaymentConvertorAdapter::class);
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        bcscale(2);

        // DB::listen(function (QueryExecuted $query) {

        //     info($query->sql);

        // });
    }
}
