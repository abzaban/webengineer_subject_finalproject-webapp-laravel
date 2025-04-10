<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class prediosRequest extends FormRequest
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
        'pred_tempPromedioAnual'=>'required|numeric|max:99',
        'pred_tamanio'=>'required|numeric|min:1',
        'pred_ph'=>'required|numeric|min:0.0|max:14.0'
        ];
    }
    public function messages()
    {
        return [
            'pred_tempPromedioAnual.required' => 'El campo temperatura es requerido',
            'pred_tempPromedioAnual.numeric' => 'Solo valores numéricos',
            'pred_tempPromedioAnual.max'=>'Este campo acepta valores máximos de 2 dígitos',
            'pred_tamanio.required' => 'El campo tamaño es requerido',
            'pred_tamanio.numeric' => 'Solo valores numéricos',
            'pred_tamanio.min' => 'Solo valores positivos',
            'pred_ph.required' => 'El campo pH es requerido',
            'pred_ph.numeric' => 'Solo valores númericos',
            'pred_ph.min' => 'Solo valores positivos', 
            'pred_ph.max' => 'pH inválido'
        ];
    }
}
