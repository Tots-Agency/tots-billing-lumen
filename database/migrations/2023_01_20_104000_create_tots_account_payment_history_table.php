<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Registra el historial de pagos de una cuenta y como fue pagado */
        Schema::create('tots_account_payment_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('account_provider_id');
            $table->unsignedBigInteger('item_id')->nullable(true)->comment('En un futuro se podra relacionar con planes u otros tipos de pagos.');
            $table->text('caption')->nullable(true);
            $table->decimal('subtotal', 10, 2)->nullable(false)->default(0);
            $table->decimal('discount', 10, 2)->nullable(false)->default(0);
            $table->decimal('tax', 10, 2)->nullable(false)->default(0);
            $table->decimal('total', 10, 2)->nullable(false)->default(0);
            $table->integer('status', 2)->nullable(false)->default(0)->comment('1 = Payout');
            $table->string('currency', 3)->nullable(false)->default('USD');
            $table->string('external_id', 200)->nullable(true);
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('tots_account');
            $table->foreign('account_provider_id')->references('id')->on('tots_account_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_account_payment_history');
    }
};
