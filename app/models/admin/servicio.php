<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    protected $table = "servicios";

    protected $fillable = ['servicio'];

    public function caracteristicaspredio()
    {
    	return $this->belongsToMany('App\Models\Predios\Caracteristicapredio')->withTimestamps(); //un servicios pueden tener muchos predios
    }
}

 
