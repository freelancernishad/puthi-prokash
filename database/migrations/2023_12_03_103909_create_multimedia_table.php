<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia', function (Blueprint $table) {
            $table->id();
            $table->string('multimedia_categories_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('media_type')->default('video'); // 'video' or 'youtube'
            $table->text('media_url'); // For 'video', store the video file path. For 'youtube', store the YouTube embed link.
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
        Schema::dropIfExists('multimedia');
    }
}
