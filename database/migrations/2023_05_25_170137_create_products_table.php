<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('discount_status')->default(false);
            $table->string('discount_type')->nullable();
            $table->integer('discount')->nullable();
            $table->string('prossod')->nullable();
            $table->string('total_page')->nullable();
            $table->string('release_date')->nullable();
            $table->string('cover_type')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('visit');
            $table->integer('share');
            $table->integer('buy');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
