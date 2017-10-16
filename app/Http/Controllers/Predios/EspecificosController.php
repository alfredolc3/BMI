<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regimen;
use App\Datoespecifico;
use App\Tipoterreno;
use App\Sepomex;

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


    public function store(Request $request)
    {
        $datosEspecificos = new Datoespecifico();
        if (!$datosEspecificos) {
            $datosEspecificos = Datoespecifico::where('idDatosPrincipales', $request->idDatosPrincipales)
                ->first();
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

    public function edit($id)
    {
        $datosespecificos = Datoespecifico::where('idDatosPrincipales', $id)
            ->first();
        if(!$datosespecificos){
            $datosespecificos = new \stdClass();
            $datosespecificos->idDatosPrincipales = $id;
        }

        $regimen = Regimen::orderBy('id', 'ASC')->lists('regimen', 'id');
        $tipoTerreno = Tipoterreno::orderBy('id', 'ASC')->lists('tipoTerreno', 'id');
        return view('predios.especificos')
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
