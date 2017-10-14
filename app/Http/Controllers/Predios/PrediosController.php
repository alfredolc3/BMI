<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Datoprincipal;
use App\Tipologiainmueble;
use Laracasts\Flash\Flash;

class PrediosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosprincipales = Datoprincipal::orderBy('id', 'ASC')->paginate(5);
        return view('predios.index')->with('datosprincipales', $datosprincipales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $datosprincipales = Tipologiainmueble::orderBy('id', 'ASC')->lists('tipoInmueble','id');
       // $servicios = Servicio::orderBy('servicio','ASC')->lists('servicio');
        return view('predios.create')
            ->with('tinmuebles', $datosprincipales);
        ///    ->with('servicios', $servicios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosprincipales = new Datoprincipal($request->all());
        $datosprincipales->idUser = \Auth::user()->id;
        //dd($datosprincipales);
        //dd($request->all());
        $datosprincipales->save();
        Flash::success("Se ha registrado el nuevo Inmueble de forma exitosa!");
        return redirect()->route('predios.predios.index');
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
        $datosprincipales = Datoprincipal::find($id);
        return view('predios.predios.edit')->with('datosprincipales',$datosprincipales);
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
        $datosprincipales = Datoprincipal::find($id);
        $datosprincipales->fechaRegistro = $request->fechaRegistro;
        $datosprincipales->tipoOperacion = $request->tipoOperacion;
        $datosprincipales->informante = $request->informante;
        $datosprincipales->telefono = $request->telefono;
        $datosprincipales->linkWeb = $request->linkWeb;
        $datosprincipales->valorOperacion = $request->valorOperacion;
        $datosprincipales->save();

        Flash::warning('El Inmueble ha sido modificado con exito!');
        return redirect()->route('predios.index');
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
