<?php

namespace App\Services\Payments\App\Commands;

use App\Services\Currencies\Database\Models\Currency;
use App\Services\Payments\Database\Enums\PaymentDriverEnum;
use App\Services\Payments\Database\Models\PaymentMethod;

use Illuminate\Console\Command;
class InstallPaymentsCommand extends Command
{
    protected $signature = 'payments:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Установка сервиса приема платежей';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Установка платежных систем...');

        $this->installPaymentMethods();
        
        $this->info('Платежные системы установлены.');
    }

    public function installPaymentMethods(): void
    {
        PaymentMethod::query()
            ->firstOrCreate(
            [
                'driver' => PaymentDriverEnum::test ,
                'driver_currency_id' => Currency::RUB
            ], [
                'name' => 'Тестовый способ',
                'active' => app()->isProduction()? false : true,
            ]);

        PaymentMethod::query()
            ->firstOrCreate(
            [
                'driver' => PaymentDriverEnum::ykassa,
                'driver_currency_id' => Currency::RUB

            ], [
                'name' => 'Банковская Карта',
                'active' => app()->isProduction()? false : true,
            ],);

        PaymentMethod::query()
            ->firstOrCreate(
            [
                'driver' => PaymentDriverEnum::test ,
                'driver_currency_id' => Currency::USD
            ], [
                'name' => 'Тестовый способ',
                'active' => app()->isProduction()? false : true,
            ]);

    }
}