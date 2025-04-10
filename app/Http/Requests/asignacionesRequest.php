<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class asignacionesRequest extends FormRequest
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
        'fechaInicio'=>'required|after_or_equal:yesterday',
        'fechaFin'=>'required|after_or_equal:fechaInicio'
        ];
    }
    public function messages()
    {
        return [
            'fechaInicio.required' => 'El campo de fecha inicio es requerido',
            'fechaInicio.after_or_equal' => 'Ingrese una fecha igual o posterior a la actual',
            'fechaFin.required' => 'El campo de fecha fin es requerido',
            'fechaFin.after_or_equal' => 'Ingrese una fecha posterior a fecha inicio'
        ];
    }
}
