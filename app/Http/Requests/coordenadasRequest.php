<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class coordenadasRequest extends FormRequest
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
        'coord_altitud'=>'required|numeric',
        'coord_latitud'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'coord_altitud.required' => 'El campo altitud es requerido',
            'coord_altitud.numeric' => 'Solo valores numéricos',
            'coord_latitud.required' => 'El campo latitud es requerido',
            'coord_latitud.numeric' => 'Solo valores numéricos'
        ];
    }
}
