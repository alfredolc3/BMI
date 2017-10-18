<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Zona;
use Laracasts\Flash\Flash;
use App\Http\Requests\ZonaRequest;

class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = Zona::orderBy('id', 'ASC')->paginate(5);
        return view('admin.zonas.index')->with('zonas', $zonas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.zonas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZonaRequest $request)
    {
         $zonas = new Zona($request->all());
        //dd($zonas);
        //dd($request->all());
        $zonas->save();
        Flash::success("Se ha registrado ". $zonas->zona . " de forma exitosa!");
        return redirect()->route('admin.zonas.index');
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
        $zonas = Zona::find($id);
        return view('admin.zonas.edit')->with('zona',$zonas);
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
        $zonas = Zona::find($id);
        $zonas->zona = $request->zona;
        $zonas->save();

        Flash::warning('El Zona '. $zonas->zona . ' ha sido editado con exito!');
        return redirect()->route('admin.zonas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zonas = Zona::find($id);
        $zonas->delete();

        Flash::error('El zona '. $zonas->zona . ' a sido borrado de forma exitosa!');
        return redirect()->route('admin.zonas.index');
        //dd($user);
    }
}
