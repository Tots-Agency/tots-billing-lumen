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
        Schema::create('tots_account_payment_method', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('provider_id');
            $table->string('title', 200)->nullable(true);
            $table->tinyInteger('is_primary')->nullable(false)->default(0)->comment('0 = NO, 1 = YES');
            $table->tinyInteger('status')->nullable(false)->default(0)->comment('0 = Inactive, 1 = Active');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('tots_account');
            $table->foreign('provider_id')->references('id')->on('tots_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_account_payment_method');
    }
};
