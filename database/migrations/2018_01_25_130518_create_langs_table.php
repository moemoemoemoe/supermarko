<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');

            $table->string('name_en');
            $table->text('desc_en');

            $table->string('name_fr');
            $table->text('desc_fr');

             $table->string('name_ar');
            $table->text('desc_ar');

             $table->string('name_fil');//philipin or tl tagalog
            $table->text('desc_fil');

             $table->string('name_am');//amharic ethiopia
            $table->text('desc_am');

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
        Schema::dropIfExists('langs');
    }
}
