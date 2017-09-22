<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UbicacionManzana;
use Laracasts\Flash\Flash;

class UbicacionesManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacionesmanzana = UbicacionManzana::orderBy('id', 'ASC')->paginate(5);
        return view('admin.ubicacionesmanzana.index')->with('ubicacionesmanzana', $ubicacionesmanzana);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ubicacionesmanzana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ubicacionesmanzana = new UbicacionManzana($request->all());
        $ubicacionesmanzana->save();
        Flash::success("Se ha registrado ". $ubicacionesmanzana->ubicacionManzana . " de forma exitosa!");
        return redirect()->route('admin.ubicacionesmanzana.index');
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
        $ubicacionesmanzana = UbicacionManzana::find($id);
        return view('admin.ubicacionesmanzana.edit')->with('ubicacionesmanzana',$ubicacionesmanzana);
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
        $ubicacionesmanzana = UbicacionManzana::find($id);
        $ubicacionesmanzana->ubicacionManzana = $request->ubicacionManzana;
        $ubicacionesmanzana->save();

        Flash::warning('La Ubicacion de la Manzana '. $ubicacionesmanzana->ubicacionManzana . ' ha sido editado con exito!');
        return redirect()->route('admin.ubicacionesmanzana.index');
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
