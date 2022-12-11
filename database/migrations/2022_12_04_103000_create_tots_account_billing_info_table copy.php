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
        Schema::create('tots_account_billing_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('legal_name', 200)->nullable(true);
            $table->string('legal_number', 200)->nullable(true);
            $table->string('address', 200)->nullable(true);
            $table->string('address_two', 200)->nullable(true);
            $table->string('city', 200)->nullable(true);
            $table->string('state', 200)->nullable(true);
            $table->string('zip', 200)->nullable(true);
            $table->string('country', 200)->nullable(true);
            $table->string('phone', 200)->nullable(true);
            $table->string('email', 200)->nullable(true);
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('tots_account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_account_billing_info');
    }
};
