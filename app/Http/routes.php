<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tipo-especie', 'TipoEspecieController');
Route::resource('comision', 'ComisionController');
Route::resource('moneda', 'MonedaController');
Route::resource('especie', 'EspecieController');
Route::resource('comision-por-especie', 'ComisionPorEspecieController');
Route::resource('operacion', 'OperacionController');
