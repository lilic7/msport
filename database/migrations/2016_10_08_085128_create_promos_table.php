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
            $table->string('title');
            $table->integer('length');
            $table->integer('frames');
            $table->integer('promo_type_id')->unsigned();
            $table->string('path');
            $table->integer('category_id')->unsigned();
            $table->boolean('onair')->default(1);
            $table->dateTime('first_air')->nullable();
            $table->dateTime('final_air')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('promo_type_id')->references('id')->on('promo_types');
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
