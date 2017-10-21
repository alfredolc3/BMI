<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;

class datoespecifico extends Model
{
    protected $table = "datosespecificos";

    protected $fillable = ['idDatosPrincipales', 'idSepomex', 'calle', 'numeroInt.', 'numeroExt.','longitud', 'latitud', 'altitud', 'tipoPredio', 'idRegimenPropiedad', 'idTipoTerreno', 'superficieTerreno', 'superficieConstruccion', 'idUsoSuelo'];
}
