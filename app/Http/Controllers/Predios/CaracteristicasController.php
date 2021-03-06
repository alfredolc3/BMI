<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Predios\Caracteristicapredio;
use App\Models\Admin\Servicio;
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
    public function index($id)
    {
        //Consulto en la base si existe las caracteristicas del predio de datos principales
        $caracteristicas = Caracteristicapredio::where('idDatosPrincipales', $id)->first();

        if ($caracteristicas!=null) {
           //dd('si hay datos');
           return $this->edit($id);
        }

        //dd('no hay datos');

        
        $manzana = Ubicacionmanzana::orderBy('ubicacionManzana', 'ASC')->lists('ubicacionManzana','id');
        $vialidad = Tipovialidad::orderBy('tipoVialidad', 'ASC')->lists('tipoVialidad','id');
        $zona = Zona::orderBy('zona', 'ASC')->lists('zona','id');
        $topografia = Topografia::orderBy('topografia', 'ASC')->lists('topografia','id');
        $forma = Forma::orderBy('forma', 'ASC')->lists('forma','id');
        $frente = Frente::orderBy('frente', 'ASC')->lists('frente','id');
        $servicios = Servicio::orderBy('servicio','ASC')->lists('servicio','id');
            return view('predios.caracteristicas.index')
                ->with('idDatosPrincipales', $id)
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
       
       // dd($request->all());
       // dd($request->servicios);
        
        $caracteristicas = new Caracteristicapredio();
        $caracteristicas->fill($request->all());
        $caracteristicas->save();

        $caracteristicas->services()->sync($request->servicios);

        
        //Nota aun no puedo guardar los datos

        \Flash::success("Se ha registrado las caracteristicas de forma exitosa!");
        return redirect()->route('datos.predios.index');
       
    }

    public function edit($id)
    {
        $caracteristicas = Caracteristicapredio::where('idDatosPrincipales', $id)->first();

        $idCaracteristicasPredio = ($caracteristicas->id); //id de la tabla caracteristicas predio
 
        //dd($idCaracteristicasPredio);
        $mis_Servicios = $caracteristicas->services->lists('id')->ToArray();

        //dd($mis_Servicios);
        $manzana = Ubicacionmanzana::orderBy('ubicacionManzana', 'ASC')->lists('ubicacionManzana','id');
        $vialidad = Tipovialidad::orderBy('tipoVialidad', 'ASC')->lists('tipoVialidad','id');
        $zona = Zona::orderBy('zona', 'ASC')->lists('zona','id');
        $topografia = Topografia::orderBy('topografia', 'ASC')->lists('topografia','id');
        $forma = Forma::orderBy('forma', 'ASC')->lists('forma','id');
        $frente = Frente::orderBy('frente', 'ASC')->lists('frente','id');
        $servicios = Servicio::orderBy('servicio','ASC')->lists('servicio','id');
        return view('predios.caracteristicas.edit')
                ->with('idDatosPrincipales', $id)
                ->with('caracteristicas', $caracteristicas)
                ->with('ubicacionManzana', $manzana)
                ->with('tipoVialidad', $vialidad)
                ->with('zona', $zona)
                ->with('topografia', $topografia)
                ->with('forma', $forma)
                ->with('frente', $frente)
                ->with('servicios', $servicios)
                ->with('mis_Servicios', $mis_Servicios); 
       
    }


    public function update(Request $request)
    {
        
        
        $caracteristicas = Caracteristicapredio::where('idDatosPrincipales', $request->idDatosPrincipales)->first();
        $caracteristicas->fill($request->all());
        $caracteristicas->save();

        $caracteristicas->services()->sync($request->servicios);
         

        \Flash::success("Se ha modificado las caracteristicas de forma exitosa!");
        return redirect()->route('datos.predios.index');
        
    }

    
    public function destroy($id)
    {
        //
    }
}
