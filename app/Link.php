<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function carteira(){
    	return $this->belongsTo('App\carteira');
    }

    public function click(){
    	return $this->hasMany('App\Click');
    }

}
