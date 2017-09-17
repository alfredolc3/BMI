<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sepomex extends Model
{
    protected $table = "sepomex";

    protected $fillable = ['idEstado', 'estado', 'idMunicipio', 'municipio', 'ciudad', 'tipoZona', 'cp', 'asentamiento', 'tipoAsentamiento'];
}
