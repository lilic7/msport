<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('video_id')->unsigned();
            $table->integer('promo_type_id')->unsigned();
            $table->dateTime('first_air')->nullable();
            $table->dateTime('final_air')->nullable();
            $table->timestamps();

            $table  ->foreign('video_id')
                ->references('id')
                ->on('videos');

            $table  ->foreign('promo_type_id')
                ->references('id')
                ->on('promo_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
