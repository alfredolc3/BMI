<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Forma;
use Laracasts\Flash\Flash;

class FormasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formas = Forma::orderBy('id', 'ASC')->paginate(5);
        return view('admin.formas.index')->with('formas', $formas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formas = new Forma($request->all());
        //dd($formas);
        //dd($request->all());
        $formas->save();
        Flash::success("Se ha registrado ". $formas->forma . " de forma exitosa!");
        return redirect()->route('admin.formas.index');
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
        $formas = Forma::find($id);
        return view('admin.formas.edit')->with('forma',$formas);
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
        $formas = Forma::find($id);
        $formas->forma = $request->forma;
        $formas->save();

        Flash::warning('La Forma '. $formas->forma . ' ha sido editado con exito!');
        return redirect()->route('admin.formas.index');

        
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
        //
    }
}
