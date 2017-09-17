<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datoprincipal extends Model
{
     protected $table = "datosprincipales";

    protected $fillable = ['idUser', 'fechaRegistro', 'informante', 'telefono', 'linkWeb', 'valorOperacion'];
}
