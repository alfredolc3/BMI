<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrediosRequest extends Request
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
            'idTipoInmueble' => 'required',
            'fechaRegistro' => 'required|date|before:tomorrow',
            'tipoOperacion' => 'required',
            'informante' => 'min:5|max:25|string|required',
            'telefono' => 'min:7|max:13|required',
            'tipoValor' => 'required',
            'valorOperacion' => 'min:4|max:12|required', 
            'linkWeb' => 'string',

        ];
    }
}
