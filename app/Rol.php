<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

	protected $fillable = [
        'nombre',
    ];
    public function integrante(){
    	return $this->hasMany('App\Integrante');
    }
}
