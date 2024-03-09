<?php

namespace App\Providers;

use App\Services\Ykassa\YkassaConfig;
use App\Services\Ykassa\YkassaService;
use Illuminate\Support\ServiceProvider;

class YkassaServiceProvider extends ServiceProvider
{

    public function register(): void
    {

        //TODO Решить нужно ли тут возвращать singleTon
        $this->app->singleton(YkassaService::class, function() {

            $config = config('services.ykassa');

            return new YkassaService(
    
                new YkassaConfig(
                    key: $config['key'],
                    shopId: $config['shopId'],
                )
    
            );

        });
    }

    public function boot(): void
    {

    }

}
