<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
     public function brande(){
    	return $this->belongsTo('App\Brande','brand_id')->select(['id', 'brande_name']);
    }
     public function sub(){
    	return $this->hasMany('App\Sub')->select(['id', 'name_sub','price','item_id','image_url_original','content']);
    }
     public function sub_en(){
        return $this->hasMany('App\Sub')->select(['id','name_sub','content','name_sub_en','price','item_id','image_url_original','content_en']);
    }

     public function sub_fr(){
    	return $this->hasMany('App\Sub')->select(['id','name_sub','content', 'name_sub_fr','price','item_id','image_url_original','content_fr']);
    }

     public function sub_ar(){
    	return $this->hasMany('App\Sub')->select(['id','name_sub','content', 'name_sub_ar','price','item_id','image_url_original','content_ar']);
    }
     public function sub_fil(){
    	return $this->hasMany('App\Sub')->select(['id', 'name_sub','content','name_sub_fil','price','item_id','image_url_original','content_fil']);
    }
     public function sub_am(){
    	return $this->hasMany('App\Sub')->select(['id','name_sub','content', 'name_sub_am','price','item_id','image_url_original','content_am']);
    }
}
