<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_requests', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('refs');
            $table->string('amount_paid');
            $table->string('channel');
            $table->unsignedBigInteger('user_id');
            $table->enum('payment_status',['PENDING PAYMENT','PAID'])->default('PENDING PAYMENT');
            $table->string('currency_conversion');
            $table->double('currency_rate');
            $table->string('account_options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_requests');
    }
}
