<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EspecificoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'calle'     => 'required|string|min:5',
            'numeroExt.' => 'string|min:1|max:5',
            'numeroInt.' => 'string|min:1|max:5',
            'cp'        => 'min:5|max:5|required',
            'longitud'  => 'numeric',
            'latitud'   => 'numeric',
            'altitud'   => 'numeric',
            'tipoPredio' => '',
            'idRegimenPropiedad' => '',
            'idTipoTerreno' => '',
            'superficieTerreno' =>'numeric',
            'suerficieConstruccion' => 'numeric',
            'UsoSuelo' => '',
            
        ];
    }
}
