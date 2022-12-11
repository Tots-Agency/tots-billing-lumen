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
        Schema::create('tots_account_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('provider_id');
            $table->tinyInteger('frequency')->nullable(false)->default(0)->comment('0 = Month, 1 = Year');
            $table->decimal('amount')->nullable(false)->default(0);
            $table->dateTime('start')->nullable(true);
            $table->dateTime('end')->nullable(true);
            $table->json('data')->nullable(true);
            $table->tinyInteger('status')->nullable(false)->default(0)->comment('0 = Pending, 1 = Payout, 2 = Canceled');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('tots_account');
            $table->foreign('plan_id')->references('id')->on('tots_plan');
            $table->foreign('provider_id')->references('id')->on('tots_provider');

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_account_plan');
    }
};
