<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generic extends Model
{
     public function zone(){
    	return $this->belongsTo('App\Zone');
    }
}
