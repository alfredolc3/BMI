<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristicapredio extends Model
{
    protected $table = "caracteristicaspredio";

    protected $fillable = ['idDatosPrincipales', 'idUsoSuelo','idUbicacionManzana','idTipoVialidad','proximidadUrbana','idClasificacionZona','idTopografia', 'idForma','servicios','idFrente','vistasPanoramicas'];

    public function forma()
    {
    	return $this->belongsTo('App\forma');
    }
}
