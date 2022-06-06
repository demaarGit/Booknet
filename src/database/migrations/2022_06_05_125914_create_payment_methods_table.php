<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_system_id')->constrained();
            $table->string('name', 100);
            $table->float('comission', 8, 2);
            $table->string('image_url', 255);
            $table->string('pay_url', 255);
            $table->boolean('is_available')->default(true);
            $table->string('countries', 255);
            $table->string('allowed_countries_rule', 20)->default('all');
            $table->smallInteger('priority');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
