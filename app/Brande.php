<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brande extends Model
{
     public function generic(){
    	return $this->belongsTo('App\Generic');
    }
}
