<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CaracteristicasPredioRequest extends Request
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
            'ubicacionManzana'=>'required',
            'tipoVialidad' => 'required',
            'proximidadUrbana' => 'required',
            'tipoVialidad' => 'required',
            'proximidadUrbana' => 'required',
            'zona' => 'required',
            'topografia' => 'required',
            'forma' => 'required',
            'frente' => 'required',
            'vistasPanoramicas' => 'required',
            'servicios' => 'required',

               ];
    }
}
