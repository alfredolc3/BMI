<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Frente;
use Laracasts\Flash\Flash;

class FrentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frentes = Frente::orderBy('id', 'ASC')->paginate(5);
        return view('admin.frentes.index')->with('frentes', $frentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frentes = new Frente($request->all());
        //dd($frentes);
        //dd($request->all());
        $frentes->save();
        Flash::success("Se ha registrado ". $frentes->frente . " de forma exitosa!");
        return redirect()->route('admin.frentes.index');
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
        $frentes = Frente::find($id);
        return view('admin.frentes.edit')->with('frente',$frentes);
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
        $frentes = Frente::find($id);
        $frentes->frente = $request->frente;
        $frentes->save();

        Flash::warning('El Frente '. $frentes->frente . ' ha sido editado con exito!');
        return redirect()->route('admin.frentes.index');

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
