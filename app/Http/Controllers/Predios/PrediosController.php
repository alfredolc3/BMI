<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Predios\Datoprincipal;
use App\Models\Admin\Tipologiainmueble;
use Laracasts\Flash\Flash;

class PrediosController extends Controller
{

    public function index()
    {
        
        $datosprincipales = Datoprincipal::orderBy('id', 'ASC')->paginate(5);
        return view('predios.index')
        ->with('datosprincipales', $datosprincipales);
    }


    public function create()
    {

        $tinmuebles = Tipologiainmueble::orderBy('id', 'ASC')->lists('tipoInmueble','id');
        return view('predios.create')
            ->with('tinmuebles', $tinmuebles);
    }


    public function store(Request $request)
    {
        $datosprincipales = new Datoprincipal($request->all());
        $datosprincipales->idUser = \Auth::user()->id;
        //dd($datosprincipales);
        //dd($request->all());
        $datosprincipales->save();
        Flash::success("Se ha registrado el nuevo Inmueble de forma exitosa!");
        return redirect()->route('datos.predios.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tipoInmueble = Tipologiainmueble::orderBy('id', 'ASC')->lists('tipoInmueble','id');
        
        $datosprincipales = Datoprincipal::find($id);
        
        return view('predios.edit')
            ->with('tinmuebles', $tipoInmueble)
            ->with('datosprincipales', $datosprincipales);
    }


    public function update(Request $request, $id)
    {
        $datosprincipales = Datoprincipal::find($id);
        $datosprincipales->idTipoInmueble = $request->idTipoInmueble;
        $datosprincipales->fechaRegistro = $request->fechaRegistro;
        $datosprincipales->tipoOperacion = $request->tipoOperacion;
        $datosprincipales->informante = $request->informante;
        $datosprincipales->telefono = $request->telefono;
        $datosprincipales->linkWeb = $request->linkWeb;
        $datosprincipales->tipoValor = $request->tipoValor;
        $datosprincipales->valorOperacion = $request->valorOperacion;
        $datosprincipales->save();

        Flash::warning('El Inmueble ha sido modificado con exito!');
        return redirect()->route('datos.predios.index');
    }


    public function destroy($id)
    {
        //
    }

}
