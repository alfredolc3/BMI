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

Route::get('ruta de la barra de direccion', function () {
    return view('vista a la que me dirijo');
});

*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function(){
	//crear nuevos registros
	Route::resource('users','UsersController');
	Route::resource('formas','FormasController');
	Route::resource('frentes','FrentesController');
	Route::resource('regimenes','RegimenesController');
	Route::resource('sepomex','SepomexController');
	Route::resource('tipologiasinmueble','TipologiasInmuebleController');
	Route::resource('tiposterreno','TiposTerrenoController');
	Route::resource('tiposvialidad','TiposVialidadController');
	Route::resource('topografias','TopografiasController');
	Route::resource('ubicacionesmanzana','UbicacionesManzanaController');
	Route::resource('usossuelo','UsosSueloController');

	//eliminar registros

	Route::get('users/{id}/destroy', [
		'uses' 	=> 'UsersController@destroy',
		'as'	=>	'admin.users.destroy'
	]);
});

Route::get('nregistro', function () {
    return view('registros.nuevo');
});



