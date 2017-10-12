<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoTerreno;
use Laracasts\Flash\Flash;
use App\Http\Requests\TipoTerrenoRequest;

class TiposTerrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposterreno = TipoTerreno::orderBy('id', 'ASC')->paginate(5);
        return view('admin.tiposterreno.index')->with('tiposterreno', $tiposterreno);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiposterreno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoTerrenoRequest $request)
    {
        $tiposterreno = new TipoTerreno($request->all());
        //dd($tiposterreno);
        //dd($request->all());
        //dd("Se ha registrado ". $tiposterreno->tipoterreno . " de forma exitosa!");
        $tiposterreno->save();
        Flash::success("Se ha registrado ". $tiposterreno->tipoTerreno . " de forma exitosa!");
        return redirect()->route('admin.tiposterreno.index');
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
         $tiposterreno = TipoTerreno::find($id);
        return view('admin.tiposterreno.edit')->with('tipoTerreno',$tiposterreno);
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
        $tiposterreno = TipoTerreno::find($id);
        $tiposterreno->tipoTerreno = $request->tipoTerreno;
        $tiposterreno->save();

        Flash::warning('El  Tipo de Terreno '. $tiposterreno->tipoTerreno . ' ha sido editado con exito!');
        return redirect()->route('admin.tiposterreno.index');

        
        //dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiposterreno = TipoTerreno::find($id);
        $tiposterreno->delete();

        Flash::error('El tipo de terreno '. $tiposterreno->tipoTerreno . ' a sido borrado de forma exitosa!');
        return redirect()->route('admin.tiposterreno.index');
        //dd($user);
    }
}