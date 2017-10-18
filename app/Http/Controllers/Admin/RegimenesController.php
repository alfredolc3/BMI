<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Regimen;
use Laracasts\Flash\Flash;
use App\Http\Requests\RegimenRequest;

class RegimenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regimenes = Regimen::orderBy('id', 'ASC')->paginate(5);
        return view('admin.regimenes.index')->with('regimenes', $regimenes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regimenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegimenRequest $request)
    {
        $regimenes = new Regimen($request->all());
        //dd($regimenes);
        //dd($request->all());
        $regimenes->save();
        Flash::success("Se ha registrado ". $regimenes->regimen . " de forma exitosa!");
        return redirect()->route('admin.regimenes.index');
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
        $regimenes = Regimen::find($id);
        return view('admin.regimenes.edit')->with('regimen',$regimenes);
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
        $regimenes = Regimen::find($id);
        $regimenes->regimen = $request->regimen;
        $regimenes->save();

        Flash::warning('El Regimen '. $regimenes->regimen . ' ha sido editado con exito!');
        return redirect()->route('admin.regimenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regimenes = regimen::find($id);
        $regimenes->delete();

        Flash::error('El regimen '. $regimenes->regimen . ' a sido borrado de forma exitosa!');
        return redirect()->route('admin.regimenes.index');
        //dd($user);
    }
}
