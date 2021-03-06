<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Topografia;
use Laracasts\Flash\Flash;
use App\Http\Requests\TopografiaRequest;
class TopografiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topografias = Topografia::orderBy('id', 'ASC')->paginate(5);
        return view('admin.topografias.index')->with('topografias', $topografias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topografias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopografiaRequest $request)
    {
        $topografias = new Topografia($request->all());
        $topografias->save();
        Flash::success("Se ha registrado ". $topografias->topografia . " de forma exitosa!");
        return redirect()->route('admin.topografias.index');
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
        $topografias = Topografia::find($id);
        return view('admin.topografias.edit')->with('topografia',$topografias);
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
        $topografias = Topografia::find($id);
        $topografias->topografia = $request->topografia;
        $topografias->save();

        Flash::warning('La Topografia '. $topografias->topografia . ' ha sido editado con exito!');
        return redirect()->route('admin.topografias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy($id)
    {
        $topografias = Topografia::find($id);
        $topografias->delete();

        Flash::error('La topografia '. $topografias->topografia . ' a sido borrado de forma exitosa!');
        return redirect()->route('admin.topografias.index');
        //dd($user);
    }
}
