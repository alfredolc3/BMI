<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class predios_servicios extends Model
{
    protected $table = "predios_servicios";

    protected $fillable = ['idDatosPrincipales', 'idServicios'];
}
