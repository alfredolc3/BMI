<?php

namespace App\Models\Predios;

use Illuminate\Database\Eloquent\Model;

class datoprincipal extends Model
{
     protected $table = "datosprincipales";

    protected $fillable = ['idUser', 'idTipoInmueble', 'fechaRegistro', 'tipoOperacion', 'informante', 'telefono', 'linkWeb', 'valorOperacion'];
}
