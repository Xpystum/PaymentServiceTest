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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->uuid('uuid')->unique();
            $table->timestamps();


            $table->string('status'); //pending, completed, cancelled

            $table->string('currency_id'); //pending, completed, cancelled

            //если валюты и ордера микросервесы (так не получится)
            $table->foreign('currency_id')->references('id')->on('currencies'); //pending, completed, cancelled

            $table->decimal('amount', 12, 2)->comment('сумма заказов');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
