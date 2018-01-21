<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    protected $table = "imagenes";

    protected $fillable = ['idDatosPrincipales', 'ruta','nombre','observaciones'];
}
