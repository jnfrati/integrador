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

    public static function addIntegrantes(Request $request){
    	//dd($request->cantidadIntegrantes);
    	$cantIntegrantes = $request->cantidadIntegrantes;
    	$roles = Rol::get();
    	$grupo = new Grupo;
    	$grupo->nombre = $request->nombreDeGrupo;
    	$grupo->save();
    	return view('grupo.integrantes',compact('grupo', 'roles', 'cantIntegrantes'));
    }

    public static function save(Request $request){
    	//dd($request->all());
    	$i = new Integrante($request->all());
    	$i->rol()->associate(Rol::find($request->rol));
    	$r = Grupo::find($request->idGrupo)->integrantes()->save($i);
    	dd($r);
    	return redirect()->home();
    }
}
