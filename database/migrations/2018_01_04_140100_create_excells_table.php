<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('brand_id');
            $table->string('price');
            $table->integer('room_id');
            $table->integer('zone_id');
            $table->integer('generic_id');
            $table->string('image');
            $table->string('url');

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
        Schema::dropIfExists('excells');
    }
}
