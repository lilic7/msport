<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayblockVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playblock_video', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playblock_id')->unsigned();
            $table->integer('video_id')->unsigned();
            $table->timestamps();

            $table->foreign('playblock_id')->references('id')->on('playblocks');
            $table->foreign('video_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playblock_video');
    }
}
