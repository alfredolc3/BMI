<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Predios\Caracteristicapredio;
use App\Models\Admin\Servicio;
use App\Models\Admin\Usosuelo;
use App\Models\Admin\Ubicacionmanzana;
use App\Models\Admin\Tipovialidad;
use App\Models\Admin\Zona;
use App\Models\Admin\Topografia;
use App\Models\Admin\Forma;
use App\Models\Admin\Frente;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

        if ($id) {
            return $this->edit($id);
        }

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


    public function store(Request $request)
    {


        $caracteristicas = new Caracteristicapredio();
        if (!$caracteristicas) {
            $caracteristicas = Caracteristicapredio::where('idDatosPrincipales', $request->idDatosPrincipales)
                ->first();
        }
        $caracteristicas->fill($request->all());
        $caracteristicas->save();

        Flash::success("Se ha registrado las caracteristicas de forma exitosa!");
        return redirect()->route('predios.index');

    }

    public function edit($id)
    {
        $caracteristicas = Caracteristicapredio::where('idDatosPrincipales', $id)
            ->first();
        if(!$caracteristicas){
            $caracteristicas = new \stdClass();
            $caracteristicas->idDatosPrincipales = $id;
        }

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
