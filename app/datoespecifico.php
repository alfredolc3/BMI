<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datoespecifico extends Model
{
    protected $table = "datosespecificos";

    protected $fillable = ['idDatosPrincipales', 'calle', 'numero', 'idSepomex', 'longitud', 'latitud', 'altitud', 'idTipologiaInmueble', 'idRegimenPropiedad', 'idTipoTerreno', 'superficieTerreno', 'superficieConstruccion', 'superficieComun', 'indiviso'];
}
