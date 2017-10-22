<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;
use App\Http\Requests\EspecificoRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Regimen;
use App\Models\predios\Datoespecifico;
use App\Models\Admin\Tipoterreno;
use App\Models\Admin\Sepomex;
use App\Models\Admin\Usosuelo;

class EspecificosController extends Controller
{

    protected $respuesta;
    protected $codigoHttp;
    
    public function __construct()
    {
        $this->respuesta = [
            'status' => 'success',
            'mensaje' => '',
            'data' => []
        ];
        $this->codigoHttp = 200;
    }


    public function index($id = null)
    {
        //Consulto en la base si existe las caracteristicas del predio de datos principales
        $especificos = Datoespecifico::where('idDatosPrincipales', $id)->first();

        if ($especificos!=null) {
           //dd('si hay datos');
           return $this->edit($id);
        }

        $usossuelo = Usosuelo::orderBy('usoSuelo', 'ASC')->lists('usoSuelo','id');
        $regimen = Regimen::orderBy('id', 'ASC')->lists('regimen', 'id');
        $tipoTerreno = Tipoterreno::orderBy('id', 'ASC')->lists('tipoTerreno', 'id');
        return view('predios.especificos.index')
            ->with('idDatosPrincipales', $id)
            ->with('usoSuelo', $usossuelo)
            ->with('regimen', $regimen)
            ->with('tipoTerreno', $tipoTerreno);
    }


    public function store(EspecificoRequest $request)
    {
        $datosEspecificos = new Datoespecifico();
        if (!$datosEspecificos) {

            $datosEspecificos = Datoespecifico::where('idDatosPrincipales', $request->idDatosPrincipales)
                ->first();
        }

        //dd($request->all());

        
        $datosEspecificos->fill($request->all());
        $datosEspecificos->save();

        Flash::success("Se ha registrado la información especifica de forma exitosa!");
        return redirect()->route('predios.especificos.index');
                
        //$datosespecificos = new Datoespecifico($request->all());
        //$datosespecificos->idUser = \Auth::user()->id;
        //dd($datosespecificos);
        //dd($request->all());
        //$datosespecificos->save();

    }

    public function edit($id)
    {

         $datosespecificos = Datoespecifico::where('idDatosPrincipales', $id)->first();

        $idDatosEspecificos = ($datosespecificos->id); //id de la tabla datosespecificos predio
 


        $usossuelo = Usosuelo::orderBy('usoSuelo', 'ASC')->lists('usoSuelo','id');
        $regimen = Regimen::orderBy('id', 'ASC')->lists('regimen', 'id');
        $tipoTerreno = Tipoterreno::orderBy('id', 'ASC')->lists('tipoTerreno', 'id');
        return view('predios.especificos.index')
            ->with('idDatosPrincipales', $id)
            ->with('usoSuelo', $usossuelo)
            ->with('regimen', $regimen)
            ->with('tipoTerreno', $tipoTerreno)
            ->with('especificos', $datosespecificos);

    }

    public function destroy($id)
    {
        //
    }

    public function buscarcp(Request $request)
    {
        //$cp = Sepomex::where("cp", $request->cp)->get();

        $cp = new Sepomex();
        $cp = $cp->buscar($request->all());

        if(sizeof($cp)==0)
        {
            $this->codigoHttp = 404;
            $this->respuesta['status']= 'error';
            $this->respuesta['mensaje']= 'registro no encontrado';
        }
        else
        {
            $this->respuesta['data'] = $cp;    
        }
        //return $cp;

        
        return response()->json($this->respuesta, $this->codigoHttp);
    }
}
