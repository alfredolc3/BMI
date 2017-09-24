<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FrenteRequest extends Request
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
            'frente' =>  'min:4|max:120|required|unique:frentes',
        ];
    }
}