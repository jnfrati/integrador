<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function integrante(){
    	return $this->hasMany('App\Integrante');
    }
}
