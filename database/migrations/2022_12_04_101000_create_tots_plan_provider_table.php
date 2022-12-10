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
        Schema::create('tots_plan_provider', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('provider_id');
            $table->tinyInteger('status')->nullable(false)->default(0);
            $table->string('plan_provider_external_month_id', 100)->nullable(true);
            $table->string('plan_provider_external_year_id', 100)->nullable(true);
            $table->json('data')->nullable(true);

            $table->foreign('plan_id')->references('id')->on('tots_plan');
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
        Schema::dropIfExists('tots_plan_provider');
    }
};
