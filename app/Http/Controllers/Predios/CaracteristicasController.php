<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Caracteristicapredio;
use App\Servicio;
use App\Usosuelo;
use App\Ubicacionmanzana;
use App\Tipovialidad;
use App\Zona;
use App\Topografia;
use App\Forma;
use App\Frente;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usossuelo = Usosuelo::orderBy('usoSuelo', 'ASC')->lists('usoSuelo','id');
        $manzana = Ubicacionmanzana::orderBy('ubicacionManzana', 'ASC')->lists('ubicacionManzana','id');
        $vialidad = Tipovialidad::orderBy('tipoVialidad', 'ASC')->lists('tipoVialidad','id');
        $zona = Zona::orderBy('zona', 'ASC')->lists('zona','id');
        $topografia = Topografia::orderBy('topografia', 'ASC')->lists('topografia','id');
        $forma = Forma::orderBy('forma', 'ASC')->lists('forma','id');
        $frente = Frente::orderBy('frente', 'ASC')->lists('frente','id');
        $servicios = Servicio::orderBy('servicio','ASC')->lists('servicio','id');
            return view('predios.caracteristicas')
                ->with('usoSuelo', $usossuelo)
                ->with('ubicacionManzana', $manzana)
                ->with('tipoVialidad', $vialidad)
                ->with('zona', $zona)
                ->with('topografia', $topografia)
                ->with('forma', $forma)
                ->with('frente', $frente)
                ->with('servicios', $servicios);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caracteristicas = new Caracteristicapredio($request->all());
        //dd($caracteristicas);
        dd($request->all());
        //$caracteristicas->save();
        //Flash::success("Se ha registrado las caracteristicas de forma exitosa!");
        //return redirect()->route('predios.predios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
