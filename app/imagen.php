<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    protected $table = "imagenes";

    protected $fillable = ['idDatosPrincipales', 'imagen1','imagen2','imagen3','imagen4','imagen5','imagen6','observaciones'];
}
