<?php

namespace App\Services\Payments\Commands;

use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Payments\Models\PaymentMethod;
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
                ['driver' => PaymentDriverEnum::test ], 
                ['name' => 'Тестовый способ'],
                ['active' => app()->isProduction()? false : true ],
        );

    }
}