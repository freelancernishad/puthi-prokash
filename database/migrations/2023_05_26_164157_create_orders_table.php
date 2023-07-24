<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderId')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_amount', 8, 2);
            $table->integer('total_quantity');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'canceled'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
