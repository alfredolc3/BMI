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
            'ubicacionManzana'=>'',
            'tipoVialidad' => '',
            'proximidadUrbana' => '',
            'tipoVialidad' => '',
            'proximidadUrbana' => '',
            'zona' => '',
            'topografia' => '',
            'forma' => '',
            'frente' => '',
            'vistasPanoramicas' => '',
            'servicios' => '',
               ];
    }
}
