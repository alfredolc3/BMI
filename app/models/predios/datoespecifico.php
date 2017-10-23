<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Sepomex;

class datoespecifico extends Model
{
    protected $table = "datosespecificos";

    protected $fillable = ['idDatosPrincipales', 'idSepomex', 'calle', 'numeroInt', 'numeroExt','longitud', 'latitud', 'altitud', 'tipoPredio', 'idRegimenPropiedad', 'idTipoTerreno', 'superficieTerreno', 'superficieConstruccion', 'idUsoSuelo'];

    public function getCpAttribute()
    {
    	return $this->sepomex->cp;
    }  

    public function sepomex()
    {
    	return $this->belongsTo(Sepomex::class, 'idSepomex');
    }
}
