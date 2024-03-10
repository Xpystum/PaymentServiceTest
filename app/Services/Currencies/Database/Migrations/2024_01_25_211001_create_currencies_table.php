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
        Schema::create('currencies', function (Blueprint $table) {

            $table->string('id')->unique(); //RUB, USD, BTC

            $table->timestamps();


            $table->string('name');

            $table->decimal('price', 21, 8)->comment('Цена в основной валюте');

            $table->string('source')->comment('Источник Цены');

            $table->boolean('main')->nullable()->comment('Основная Валюта');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
