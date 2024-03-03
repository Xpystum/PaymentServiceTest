<?php

namespace App\Console\Commands;

use App\Services\Currencies\Commands\InstallCurrenciesCommand;
use App\Services\Orders\Commands\InstallOrdersCommand;
use App\Services\Payments\App\Commands\InstallPaymentsCommand;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';


    public function handle()
    {
        $this->warn('Установка приложения...');

        $this->call(InstallCurrenciesCommand::class);

        $this->call(InstallPaymentsCommand::class);

        $this->call(InstallOrdersCommand::class);

        $this->info('Приложение установлено.');
    }
}
