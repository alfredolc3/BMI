<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;

class datoprincipal extends Model 
{

    protected $table = "datosprincipales";

    protected $fillable = ['idUser', 'idTipoInmueble', 'fechaRegistro', 'tipoOperacion', 'informante', 'telefono', 'linkWeb', 'tipoValor','valorOperacion'];


    public function tipologiainmueble()
    {
    	return $this->belongsTo('App\Models\Admin\Tipologiainmueble', 'idTipoInmueble'); //un predio solo puede tener un tipo de inmueble
    }
}
