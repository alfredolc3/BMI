<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Servicio;
use Laracasts\Flash\Flash;
use App\Http\Requests\ServicioRequest;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::orderBy('id', 'ASC')->paginate(5);
        return view('admin.servicios.index')->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        $servicios = new Servicio($request->all());
        //dd($servicios);
        //dd($request->all());
        $servicios->save();
        Flash::success("Se ha registrado ". $servicios->regimen . " de forma exitosa!");
        return redirect()->route('admin.servicios.index');
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
        $servicios = Servicio::find($id);
        return view('admin.servicios.edit')->with('servicio',$servicios);
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
        $servicios = Servicio::find($id);
        $servicios->servicio = $request->servicio;
        $servicios->save();

        Flash::warning('El Servicio '. $servicios->servicio . ' ha sido editado con exito!');
        return redirect()->route('admin.servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicios = servicio::find($id);
        $servicios->delete();

        Flash::error('El servicio '. $servicios->servicio . ' a sido borrado de forma exitosa!');
        return redirect()->route('admin.servicios.index');
        //dd($user);
    }
}
