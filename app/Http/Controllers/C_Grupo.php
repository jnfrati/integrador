<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Grupo;
use App\Integrante;
class C_Grupo extends Controller
{
    public static function nuevoGrupo(){
    	
    	return view('grupo.index');
    }
	
	public static function formGrupo(Request $request){
    	$nombre = $request->nombreDeGrupo;
    	$cantIntegrantes = $request->cantIntegrantes;
    	return view('grupo.index',compact('nombre','cantIntegrantes'));
    }

    public static function addIntegrantes(Request $request){
    	//dd($request->cantidadIntegrantes);
    	$cantIntegrantes = $request->cantidadIntegrantes;
    	$roles = Rol::get();
    	$grupo = new Grupo;
    	$grupo->nombre = $request->nombreDeGrupo;
    	return view('grupo.integrantes',compact('grupo', 'roles', 'cantIntegrantes'));
    }

    public static function save(Request $request){
    	//dd($request->all());
       	$grupo = new Grupo;
    	$grupo->nombre = $request->nombreDeGrupo;
    	$grupo->save();
    	$index=0;
    	foreach ($request->nombreApellido as $r) {
    		$i[$index] = new Integrante;
    		$i[$index++]->nombreApellido = $r;
    	}
    	$index=0;
    	foreach ($request->dni as $r) {
    		$i[$index++]->dni = $r;
    	}
    	
    	$index=0;
    	foreach ($request->telefono as $r) {
    		$i[$index++]->telefono = $r;
    	}

    	$index=0;
    	foreach ($request->rol as $r) {
    		$i[$index++]->rol()->associate(Rol::find($r));
    	}
    	foreach ($i as $int) {
    		$r = $grupo->integrantes()->save($int);
    	}

    	return redirect()->home();
    }

    public static function nuevoRol(Request $request){
    	Rol::create($request->all());
    	$roles = Rol::all();
    	$grupo = new Grupo;
    	$grupo->nombre = $request->nombreDeGrupo;
    	$cantIntegrantes = $request->cantIntegrantes;
    	return view('grupo.integrantes',compact('grupo', 'roles', 'cantIntegrantes'));
    }
}
