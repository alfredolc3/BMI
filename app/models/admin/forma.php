<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class forma extends Model
{
    protected $table = "formas";

    protected $fillable = ['forma'];


    public function caracteristicaspredio()
    {
    	return $this->hasMany('App\caracteristicapredio');
    }
}
