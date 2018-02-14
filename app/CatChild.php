<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatChild extends Model
{
    public function catsub(){
    	return $this->belongsTo('App\Category','cat_id');
    }
}
