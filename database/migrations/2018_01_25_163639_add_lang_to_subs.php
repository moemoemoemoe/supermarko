<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLangToSubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('subs', function($table) {
        
            $table->string('name_sub_en')->nullable();
            $table->text('content_en')->nullable();

            $table->string('name_sub_fr')->nullable();
            $table->text('content_fr')->nullable();

             $table->string('name_sub_ar')->nullable();
            $table->text('content_ar')->nullable();

             $table->string('name_sub_fil')->nullable();//philipin or tl tagalog
            $table->text('content_fil')->nullable();

             $table->string('name_sub_am')->nullable();//amharic ethiopia
            $table->text('content_am')->nullable();
         
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
