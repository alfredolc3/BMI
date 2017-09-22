<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UsoSuelo;
use Laracasts\Flash\Flash;

class UsosSueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usossuelo = UsoSuelo::orderBy('id', 'ASC')->paginate(20);
        return view('admin.usossuelo.index')->with('usossuelo', $usossuelo);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.usossuelo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usossuelo = new UsoSuelo($request->all());
        //dd($formas);
        //dd($request->all());
        $usossuelo->save();
        Flash::success("Se ha registrado ". $usossuelo->usoSuelo . " de forma exitosa!");
        return redirect()->route('admin.usossuelo.index');
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
        $usossuelo = UsoSuelo::find($id);
        return view('admin.usossuelo.edit')->with('usossuelo',$usossuelo);
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
        $usossuelo = UsoSuelo::find($id);
        $usossuelo->usoSuelo = $request->usoSuelo;
        $usossuelo->save();

        Flash::warning('El Uso de Suelo '. $usossuelo->usoSuelo . ' ha sido editado con exito!');
        return redirect()->route('admin.usossuelo.index');

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
