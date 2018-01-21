<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Predios\imagen;

class ImagenesController extends Controller
{

    public function index($id)
    {

        $imagenes = imagen::where('idDatosPrincipales', $id)->get();
       
       return view('predios.imagenes.index', compact('id', 'imagenes'));
    }

    public function store(Request $request)
    {

        $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$request->id;

        if(!is_dir($path)){
            mkdir($path, 0777);
        }

        $files = $request->file('file');

        foreach($files as $file){

            //cambiar espacios por guiones en la imagen

            $nombre = str_replace(" ", "-", $file->getClientOriginalName()); 

            //cambiar tamaño y peso de la imagen
            $img = \Image::make($file)
            ->resize(800, 600)
            ->save($path.DIRECTORY_SEPARATOR.$nombre);

            //guardar en base de datos el directorio de la imagen
              $imagenes = new imagen();
              $imagenes->idDatosPrincipales = $request->id;
              $imagenes->ruta = 'uploads'.DIRECTORY_SEPARATOR.$request->id.DIRECTORY_SEPARATOR.$nombre;
              $imagenes->nombre = $nombre;
            $imagenes->save();

        }
    
    }

    public function destroy($id, $idDatosPrincipales, $nombre)
    {


        $imagenes = imagen::where('nombre', $nombre)
                            ->where('idDatosPrincipales', $idDatosPrincipales)->get();

        foreach ($imagenes as $imagen) {
            
            $imagen->delete();
        }
        

      $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$idDatosPrincipales.DIRECTORY_SEPARATOR.$nombre;

        if(\File::exists($path)){
          
          \File::delete($path);
        }
        
        return redirect("datos/imagenes/".$idDatosPrincipales);
    }

}
