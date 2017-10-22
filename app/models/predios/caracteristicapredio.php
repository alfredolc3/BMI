<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;

class caracteristicapredio extends Model
{
    protected $table = "caracteristicaspredio";

    protected $fillable = ['idDatosPrincipales', 'idUbicacionManzana','idTipoVialidad','proximidadUrbana','idClasificacionZona','idTopografia', 'idForma','idFrente','vistasPanoramicas'];

    public function formas()
    {
    	return $this->belongsTo('App\Models\Admin\Forma'); //un predio solo puede tener una forma
    }

    public function services()
	{
		return $this->belongsToMany('App\Models\Admin\Servicio'); //un predio pueden tener muchos servicios
	}
}
