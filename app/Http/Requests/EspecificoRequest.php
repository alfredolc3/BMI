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
            'calle'     => 'required',
            'cp'        => 'min:5|max:5|required',
            'longitud'  => 'required',
            'latitud'   => 'required',
            'altitud'   => 'required',
            'tipoPredio' => 'required',
            'idRegimenPropiedad' => 'required',
            'idTipoTerreno' => 'required',
            
        ];
    }
}
