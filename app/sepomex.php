<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sepomex extends Model
{
    protected $table = "sepomex";

    protected $fillable = ['estado', 'municipio', 'ciudad', 'tipoPredio', 'cp', 'asentamiento', 'tipoAsentamiento'];

    public function scopeSearch($query, $asentamiento)
    {
        return $query->where('asentamiento', 'LIKE', "%$asentamiento%");
    }

    public function buscar($params){
    	$query = $this->select(
    		'id',
    		'estado',
    		'municipio',
    		'ciudad',
    		'tipoPredio',
    		'cp',
    		\DB::raw('CONCAT(tipoAsentamiento, " ", asentamiento) AS asentamiento')
    		//'asentamiento',
    		//'tipoAsentamiento'
    	);

    	if(!empty($params['estado'])){
    		$query = $query->where('estado', $params['estado']);
    	}

    	if(!empty($params['municipio'])){
    		$query = $query->where('municipio', $params['municipio']);
    	}

    	if(!empty($params['ciudad'])){
    		$query = $query->where('ciudad', $params['ciudad']);
    	}

    	if(!empty($params['tipoPredio'])){
    		$query = $query->where('tipoPredio', $params['tipoPredio']);
    	}

    	if(!empty($params['cp'])){
    		$query = $query->where('cp', $params['cp']);
    	}

    	if(!empty($params['asentamiento'])){
    		$query = $query->where('asentamiento', 'LIKE', '%'.$params['asentamiento'].'%');
    	}

    	if(!empty($params['tipoAsentamiento'])){
    		$query = $query->where('tipoAsentamiento', $params['tipoAsentamiento']);
    	}

    	return $query->get();

    }
}
