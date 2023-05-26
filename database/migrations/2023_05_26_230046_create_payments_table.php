<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('trx_id')->nullable();
            $table->string('trx_date')->nullable();
            $table->string('trx_month')->nullable();
            $table->string('trx_year')->nullable();
            $table->decimal('amount', 8, 2);
            $table->string('payment_status')->nullable();
            $table->string('payment_url')->nullable();
            $table->longText('payment_ipn')->nullable();
            // Add any other payment-related columns you need

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
