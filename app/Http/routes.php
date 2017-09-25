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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	//crear nuevos registros
	Route::resource('users','UsersController');
	Route::resource('formas','FormasController');
	Route::resource('frentes','FrentesController');
	Route::resource('regimenes','RegimenesController');
	Route::resource('sepomex','SepomexController');
	Route::resource('servicios','ServiciosController');
	Route::resource('tipologiasinmueble','TipologiasInmuebleController');
	Route::resource('tiposterreno','TiposTerrenoController');
	Route::resource('tiposvialidad','TiposVialidadController');
	Route::resource('topografias','TopografiasController');
	Route::resource('ubicacionesmanzana','UbicacionesManzanaController');
	Route::resource('usossuelo','UsosSueloController');

	//eliminar registros

	Route::get('users/{id}/destroy', ['uses' 	=> 'UsersController@destroy','as'	=>	'admin.users.destroy']);
	Route::get('formas/{id}/destroy',['uses' => 'FormasController@destroy', 'as' => 'admin.formas.destroy']);
	Route::get('frentes/{id}/destroy',['uses' => 'FrentesController@destroy', 'as' => 'admin.frentes.destroy']);
	Route::get('regimenes/{id}/destroy',['uses' => 'RegimenesController@destroy', 'as' => 'admin.regimenes.destroy']);
	Route::get('sepomex/{id}/destroy',['uses' => 'SepomexController@destroy', 'as' => 'admin.sepomex.destroy']);
	Route::get('servicios/{id}/destroy',['uses' => 'ServiciosController@destroy', 'as' => 'admin.servicios.destroy']);
	Route::get('tipologiasinmueble/{id}/destroy',['uses' => 'TipologiasInmuebleController@destroy', 'as' => 'admin.tipologiasinmueble.destroy']);
	Route::get('tiposterreno/{id}/destroy',['uses' => 'TiposTerrenoController@destroy', 'as' => 'admin.tiposterreno.destroy']);
	Route::get('tiposvialidad/{id}/destroy',['uses' => 'TiposVialidadController@destroy', 'as' => 'admin.tiposvialidad.destroy']);
	Route::get('topografias/{id}/destroy',['uses' => 'TopografiasController@destroy', 'as' => 'admin.topografias.destroy']);
	Route::get('ubicacionesmanzana/{id}/destroy',['uses' => 'UbicacionesManzanaController@destroy', 'as' => 'admin.ubicacionesmanzana.destroy']);
	Route::get('usossuelo/{id}/destroy',['uses' => 'UsossueloController@destroy', 'as' => 'admin.usossuelo.destroy']);

});


// Authentication routes...
/*Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/



Route::get('nregistro', function () {
    return view('registros.nuevo');
});



