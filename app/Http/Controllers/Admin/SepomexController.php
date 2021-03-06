<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Sepomex;
use App\Models\Admin\Estado;
use App\Models\Admin\Tipoasentamiento;
use Laracasts\Flash\Flash;

class SepomexController extends Controller
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

    public function json(Request $request){
        $asentamientos = new Sepomex();
        $asentamientos = $asentamientos->buscar($request->all());

        if ($request->datatable) {
            $datatable = app('datatables')->of($asentamientos)
                ->addColumn('opciones', function ($datos) {
                });
            return $datatable->make(true);
        }

        $respuesta['data'] = $asentamientos;
        return response()->json($respuesta);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $estados = Estado::orderBy('estado','ASC')->lists('estado','estado'); //list(valor, clave) si solo pones valor la clave sera default de codigo
        $tiposasentamientos = Tipoasentamiento::orderBy('tipoasentamiento','ASC')->lists('tipoasentamiento','tipoasentamiento');


        $sepomex = Sepomex::search($request->asentamiento)->orderBy('id', 'ASC')->paginate(20);
        return view('admin.sepomex.index')
                ->with('sepomex', $sepomex)
                ->with('estados', $estados)
                ->with('tiposasentamientos', $tiposasentamientos);
        //dd('nuevo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('estado','ASC')->lists('estado');
        $tiposasentamientos = Tipoasentamiento::orderBy('tipoasentamiento','ASC')->lists('tipoasentamiento');



        return view('admin.sepomex.create')
            ->with('estados', $estados)
            ->with('tiposasentamientos', $tiposasentamientos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sepomex = new Sepomex($request->all());
        //dd($formas);
        //dd($request->all());
        $sepomex->save();
        Flash::success("Se ha registrado ". $sepomex->asentamiento . " de forma exitosa!");
        return redirect()->route('admin.sepomex.index');
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
        $estados = Estado::orderBy('estado','ASC')->lists('estado');
        $tiposasentamientos = Tipoasentamiento::orderBy('tipoasentamiento','ASC')->lists('tipoasentamiento');

        $sepomex = Sepomex::find($id);
        return view('admin.sepomex.edit')
            ->with('sepomex',$sepomex)
            ->with('estados', $estados)
            ->with('tiposasentamientos', $tiposasentamientos);

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

        $estados = Estado::orderBy('estado','ASC')->lists('estado');
        $tiposasentamientos = Tipoasentamiento::orderBy('tipoasentamiento','ASC')->lists('tipoasentamiento');

        $sepomex = Sepomex::find($id);
        $sepomex->name = $request->name;
        $sepomex->email = $request->email;
        $sepomex->type = $request->type;
        $sepomex->save();

        Flash::warning('El asentamiento ha sido editado con exito!');
        return redirect()->route('admin.sepomex.index')
            ->with('estados', $estados)
            ->with('tiposasentamientos', $tiposasentamientos);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sepomex = Sepomex::find($id);
        $sepomex->delete();

        Flash::error('El Registro a sido borrado de forma exitosa!');
        return redirect()->route('admin.sepomex.index');
        //dd($user);
    }
}
