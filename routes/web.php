<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','C_Grupo@nuevoGrupo');

Route::post('/addIntegrantes','C_Grupo@addIntegrantes');

Route::post('/save','C_Grupo@save');