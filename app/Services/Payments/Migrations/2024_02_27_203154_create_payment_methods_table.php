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
        Schema::create('payment_methods', function (Blueprint $table) {

            $table->id()->from(1001);

            $table->timestamps();

            $table->string('name')->comment('Название способы оплаты');

            $table->string('driver')->comment('Провайдер способа оплаты'); //stripe, paypal, youkassa, qiwi, tinkoff

            $table->boolean('active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
