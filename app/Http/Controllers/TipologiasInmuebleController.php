<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipologiaInmueble;
use Laracasts\Flash\Flash;

class TipologiasInmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipologiasinmueble = TipologiaInmueble::orderBy('id', 'ASC')->paginate(5);
        return view('admin.tipologiasinmueble.index')->with('tipologiasinmueble', $tipologiasinmueble);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipologiasinmueble.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipologiasinmueble = new TipologiaInmueble($request->all());
        //dd($regimenes);
        //dd("Se ha registrado ". $tipologiasinmueble->tipoinmueble . " de forma exitosa!");
        $tipologiasinmueble->save();
        Flash::success("Se ha registrado ". $tipologiasinmueble->tipoInmueble . " de forma exitosa!");
        return redirect()->route('admin.tipologiasinmueble.index');
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
        //
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
