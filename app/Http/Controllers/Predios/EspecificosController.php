<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regimen;
use App\Datoespecifico;
use App\Tipoterreno;

class EspecificosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        //dd($id);
        if ($id) {
            return $this->edit($id);
        }

        $regimen = Regimen::orderBy('id', 'ASC')->lists('regimen', 'id');
        $tipoTerreno = Tipoterreno::orderBy('id', 'ASC')->lists('tipoTerreno', 'id');
        return view('predios.especificos')
            ->with('regimen', $regimen)
            ->with('tipoTerreno', $tipoTerreno);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosEspecificos = new Datoespecifico();
        if($id){
            $datosEspecificos = Datoespecifico::find($id);
        }
        $datosEspecificos->fill($request->all());
        $datosEspecificos->save();

        Flash::success("Se ha registrado la información especifica de forma exitosa!");
        return redirect()->route('predios.predios.index');

        //$datosespecificos = new Datoespecifico($request->all());
        //$datosespecificos->idUser = \Auth::user()->id;
        //dd($datosespecificos);
        //dd($request->all());
        //$datosespecificos->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $datosespecificos = Datoespecifico::find($id);

        $regimen = Regimen::orderBy('id', 'ASC')->lists('regimen', 'id');
        $tipoTerreno = Tipoterreno::orderBy('id', 'ASC')->lists('tipoTerreno', 'id');
        return view('predios.especificos')
            ->with('regimen', $regimen)
            ->with('tipoTerreno', $tipoTerreno)
            ->with('especificos', $datosespecificos);

    }


    public function update(Request $request, $id)
    {
        $datosespecificos = Datoespecifico::find($id);
        $datosespecificos->calle = $request->calle;
        $datosespecificos->numero = $request->numero;
        $datosespecificos->cp = $request->informante;
        $datosespecificos->colonia = $request->telefono;
        $datosespecificos->estado = $request->linkWeb;
        $datosespecificos->municipio = $request->linkWeb;
        $datosespecificos->ciudad = $request->linkWeb;
        $datosespecificos->longitud = $request->longitud;
        $datosespecificos->latitud = $request->latitud;
        $datosespecificos->altitud = $request->altitud;
        $datosespecificos->tpredio = $request->tipoPredio;
        $datosespecificos->rpropiedad = $request->idRegimenPropiedad;
        $datosespecificos->tterreno = $request->idTipoTerreno;
        $datosespecificos->sterreno = $request->superficieTerreno;
        $datosespecificos->scontrsuccion = $request->superficieConstruccion;
        $datosespecificos->scomun = $request->superficiencomun;
        $datosespecificos->indiviso = $request->indiviso;
        $datosespecificos->save();

        Flash::warning('El Inmueble ha sido modificado con exito!');
        return redirect()->route('predios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
