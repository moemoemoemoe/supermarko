<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStyToOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
           Schema::table('offers', function($table) {
          $table->Integer('sty');
         
         
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
