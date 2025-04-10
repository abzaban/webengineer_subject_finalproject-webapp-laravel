<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class datosPagoRequest extends FormRequest
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
        'noTarjetaCredito'=>'required|regex:/\d{16}/',
        'mes'=>'required|numeric|min:1|max:12',
        'anio'=>'required|numeric|min:2021|max:2030',
        'nip'=>'required|regex:/[0-9][0-9][0-9]/'
        ];
    }
    public function messages()
    {
        return [
            'noTarjetaCredito.required' => 'El campo no. de tarjeta de crédito es obligatorio',
            'noTarjetaCredito.regex' => 'Formato de tarjeta inválido',
            'mes.required' => 'El campo mes es obligatorio',
            'mes.numeric' => 'El campo mes es numerico',
            'mes.min' => 'Mes inválido',
            'mes.max' => 'Mes inválido',
            'anio.required' => 'El campo año es obligatorio',
            'anio.numeric' => 'El campo año es numerico',
            'anio.min' => 'Año inválido',
            'anio.max' => 'Año inválido',
            'nip.required' => 'El campo NIP es obligatorio',
            'nip.regex' => 'Formato de NIP inválido'
        ];
    }
}
