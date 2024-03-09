<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id()->from(1001);
            

            $table->uuid('uuid')->unique();

            $table->timestamps();

            // $table->timestamps('expires_at'); // когда истекает платеж


            $table->string('status');


            $table->string('currency_id'); //валюта оплаты

            $table->foreign('currency_id')->references('id')->on('currencies'); // привязываем к валюте

            $table->decimal('amount', 12, 2); // сумма


            //полиморфное отношение
            $table->string('payable_type'); // Хранить нашу модель App\Services\Orders\Models\Order (например подписку или товар)

            $table->integer('payable_id'); // 123

            // $table->morphs('payple') 

            $table->foreignId('method_id')->nullable(); //способ оплаты у платежа QIWI, YOUCASSA, PAYPAL, BITCOIN  

            $table->foreign('method_id')->references('id')->on('payment_methods');


            $table->string('driver')->nullable(); // для удобности (но нарушается нормализация)

            $table->string('driver_payment_id')->nullable()->comment('id платежа у провайдера'); // для удобности (но нарушается нормализация)


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
