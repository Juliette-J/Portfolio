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
        Schema::create('image_hashs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_image');
            $table->integer('id_hashtag');
            $table->foreign('id_image')->references('id')->on('images');
            $table->foreign('id_hashtag')->references('id')->on('hashtags');
            $table->unique(['id_image','id_hashtag']);
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
        Schema::dropIfExists('image_hashs');
    }
};
