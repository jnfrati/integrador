<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
	public function integrantes(){
		return $this->hasMany('App\Integrante');
	}
}
