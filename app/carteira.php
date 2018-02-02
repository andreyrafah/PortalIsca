<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carteira extends Model
{
    public function link(){
    	return $this->hasMany('App\Link');
    }
}
