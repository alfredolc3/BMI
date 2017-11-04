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

//Route::get('/change_password', 'PasswordController@password');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'Admin']], function () {
    //crear nuevos registros
    Route::resource('users', 'UsersController');
    Route::resource('formas', 'FormasController');
    Route::resource('frentes', 'FrentesController');
    Route::resource('regimenes', 'RegimenesController');

    get('sepomex/json', 'SepomexController@json');
    Route::resource('sepomex', 'SepomexController');


    Route::resource('servicios', 'ServiciosController');
    Route::resource('tipologiasinmueble', 'TipologiasInmuebleController');
    Route::resource('tiposterreno', 'TiposTerrenoController');
    Route::resource('tiposvialidad', 'TiposVialidadController');
    Route::resource('topografias', 'TopografiasController');
    Route::resource('ubicacionesmanzana', 'UbicacionesManzanaController');
    Route::resource('usossuelo', 'UsosSueloController');
    Route::resource('zonas', 'ZonasController');


    //eliminar registros

    Route::get('users/{id}/destroy', ['uses' => 'UsersController@destroy', 'as' => 'admin.users.destroy']);
    Route::get('formas/{id}/destroy', ['uses' => 'FormasController@destroy', 'as' => 'admin.formas.destroy']);
    Route::get('frentes/{id}/destroy', ['uses' => 'FrentesController@destroy', 'as' => 'admin.frentes.destroy']);
    Route::get('regimenes/{id}/destroy', ['uses' => 'RegimenesController@destroy', 'as' => 'admin.regimenes.destroy']);
    Route::get('sepomex/{id}/destroy', ['uses' => 'SepomexController@destroy', 'as' => 'admin.sepomex.destroy']);
    Route::get('servicios/{id}/destroy', ['uses' => 'ServiciosController@destroy', 'as' => 'admin.servicios.destroy']);
    Route::get('tipologiasinmueble/{id}/destroy', ['uses' => 'TipologiasInmuebleController@destroy', 'as' => 'admin.tipologiasinmueble.destroy']);
    Route::get('tiposterreno/{id}/destroy', ['uses' => 'TiposTerrenoController@destroy', 'as' => 'admin.tiposterreno.destroy']);
    Route::get('tiposvialidad/{id}/destroy', ['uses' => 'TiposVialidadController@destroy', 'as' => 'admin.tiposvialidad.destroy']);
    Route::get('topografias/{id}/destroy', ['uses' => 'TopografiasController@destroy', 'as' => 'admin.topografias.destroy']);
    Route::get('ubicacionesmanzana/{id}/destroy', ['uses' => 'UbicacionesManzanaController@destroy', 'as' => 'admin.ubicacionesmanzana.destroy']);
    Route::get('usossuelo/{id}/destroy', ['uses' => 'UsossueloController@destroy', 'as' => 'admin.usossuelo.destroy']);
    Route::get('zonas/{id}/destroy', ['uses' => 'ZonasController@destroy', 'as' => 'admin.zonas.destroy']);


});

Route::group(['namespace' => 'Predios', 'prefix' => 'datos'], function () {
    Route::resource('predios', 'PrediosController');

    get('especificos/{id}', [
        'as' => 'datos.especificos.index',
        'uses' => 'EspecificosController@index'
    ]);

    get('/buscar-cp', 'EspecificosController@buscarcp'); 

    post('especificos', [
        'as' => 'datos.especificos.store',
        'uses' => 'EspecificosController@store'
    ]);

    put('especificos', [
        'as' => 'datos.especificos.update', 
        'uses' => 'EspecificosController@update'
    ]);
    
 
    get('caracteristicas/{id}', [
        'as' => 'datos.caracteristicas.index', 
        'uses' => 'CaracteristicasController@index'
    ]);


    post('caracteristicas', [
        'as' => 'datos.caracteristicas.store', 
        'uses' => 'CaracteristicasController@store'
    ]);

    put('caracteristicas', [
        'as' => 'datos.caracteristicas.update',  
        'uses' => 'CaracteristicasController@update'
    ]);



    get('imagenes/{id}', [
        'as' => 'datos.imagenes.index', 
        'uses' => 'ImagenesController@index'
    ]);

    post('imagenes', [
        'as' => 'datos.imagenes.store', 
        'uses' => 'ImagenesController@store'
    ]);

    put('imagenes', [
        'as' => 'datos.imagenes.update',  
        'uses' => 'ImagenesController@update'
    ]);


    
    //Route::resource('imagenes', 'ImagenesController');
    //Route::resource('especificos', 'EspecificosController');
    //Route::resource('caracteristicas', 'CaracteristicasController');
    
});




