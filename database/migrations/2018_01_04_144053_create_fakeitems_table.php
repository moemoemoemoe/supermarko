<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakeitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakeitems', function (Blueprint $table) {
         
              $table->increments('id');
            $table->string('name');
            $table->text('content');
            $table->integer('room_id');
            $table->integer('zone_id');
            $table->integer('generic_id');
            $table->integer('brand_id');
            $table->integer('has_sub');
            $table->string('price');
            $table->integer('status');
             $table->string('img_name');
         $table->string('image_url_original');
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
        Schema::dropIfExists('fakeitems');
    }
}
