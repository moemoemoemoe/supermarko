<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function order(){
    	return $this->hasMany('App\Order');
    }
}
