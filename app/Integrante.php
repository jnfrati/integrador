<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{

	/*
			$table->string("nombreApellido");
            $table->string("dni");
            $table->string("telefono");
	*/
	protected $fillable = [
        'nombreApellido', 'dni', 'telefono',
    ];
   	public function rol(){
   		return $this->belongsTo('App\Rol');
   	}

   	public function grupo(){
   		return $this->belongsTo('App\Grupo');	
   	}
}
