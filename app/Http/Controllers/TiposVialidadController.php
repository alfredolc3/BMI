<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoVialidad;
use Laracasts\Flash\Flash;
use App\Http\Requests\TipoVialidadRequest;

class TiposVialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposvialidad = TipoVialidad::orderBy('id', 'ASC')->paginate(5);
        return view('admin.tiposvialidad.index')->with('tiposvialidad', $tiposvialidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiposvialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoVialidadRequest $request)
    {
        $tiposvialidad = new TipoVialidad($request->all());
        //dd($tiposvialidad);
        //dd($request->all());
        $tiposvialidad->save();
        Flash::success("Se ha registrado ". $tiposvialidad->tipoVialidad . " de forma exitosa!");
        return redirect()->route('admin.tiposvialidad.index');
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
         $tiposvialidad = TipoVialidad::find($id);
        return view('admin.tiposvialidad.edit')->with('tiposvialidad',$tiposvialidad);
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
        $tiposvialidad = TipoVialidad::find($id);
        $tiposvialidad->tipoVialidad = $request->tipoVialidad;
        $tiposvialidad->save();

        Flash::warning('La vialidad '. $tiposvialidad->tipoVialidad . ' ha sido editado con exito!');
        return redirect()->route('admin.tiposvialidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiposvialidad = TipoVialidad::find($id);
        $tiposvialidad->delete();

        Flash::error('El tipo de vialidad '. $tiposvialidad->tipoVialidad . ' a sido borrado de forma exitosa!');
        return redirect()->route('admin.tiposvialidad.index');
        //dd($user);
    }
}
