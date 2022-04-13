<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoEditarRequest extends FormRequest
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
            'pc' => "required|max:30|min:2",
        ];
    }

    public function messages()
    {
        return [
            'pc.required' => "El campo no puede estar vacío",
            'pc.max' => "No es permitido mas de 30 caracteres",
            'pc.min' => "Minimo 2 caracteres"

        ];
    }
}
