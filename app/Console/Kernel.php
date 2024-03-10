<?php

namespace App\Console;

use App\Services\Currencies\App\Commands\UpdateCurrencyPricesCommand;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
   
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(UpdateCurrencyPricesCommand::class, [SourceEnum::cbrf->value])->daily();
    }

 
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

    }
}
