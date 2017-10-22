<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class tipologiainmueble extends Model
{
    protected $table = "tipologiasinmueble";

    protected $fillable =['tipoInmueble'];

       
    public function datosprincipales()
    {
    	return $this->hasMany('App\Models\Predios\Datoprincipal'); //una inmueble  puede tener muchos predios
    }

}
