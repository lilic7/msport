<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayblockStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playblock_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playblock_type_id')->unsigned();
            $table->string('var_name');
            $table->string('var_value');
            $table->string('var_value_type');
            $table->timestamps();

            $table->foreign('playblock_type_id')->references('id')->on('playblock_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playblock_structures');
    }
}
