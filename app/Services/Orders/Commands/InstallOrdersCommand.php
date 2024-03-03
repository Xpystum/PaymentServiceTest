<?php

namespace App\Services\Orders\Commands;

use App\Services\Orders\Factories\OrderFactory;
use Illuminate\Console\Command;

class InstallOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Установка сервеса Orders...');

        $this->installOrders();

        $this->info('Сервес ордер установлен.');
    }

    private function installOrders(): void
    {
        //наполнением таблицы заказами
        (new OrderFactory)->count(100)->create();
    }
}
