<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;

class caracteristicapredio extends Model
{
    protected $table = "caracteristicaspredio";

    protected $fillable = ['idDatosPrincipales', 'idUbicacionManzana','idTipoVialidad','proximidadUrbana','idClasificacionZona','idTopografia', 'idForma','idFrente','vistasPanoramicas'];

    public function services()
	{
		return $this->belongsToMany('App\Models\Admin\Servicio');
	}
}
