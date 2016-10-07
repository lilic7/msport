<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenericsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->integer('length');
            $table->string('path');
            $table->integer('category_id')->unsigned();
            $table->boolean('onair')->default(1);
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
        Schema::dropIfExists('generics');
    }
}
