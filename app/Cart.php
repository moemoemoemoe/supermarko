<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function offer(){
    	return $this->belongsTo('App\Offer','offer_id');
    }
     public function item(){
    	return $this->belongsTo('App\Item','offer_id');
    }
     public function child(){
    	return $this->belongsTo('App\Sub','offer_id');
    }

}
