<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesaEditarRequest extends FormRequest
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
            'nd' => "required|regex:/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/u|max:30",
        ];
    }

    public function messages()
    {
        return [
            'nd.required' => "El campo no puede estar vacío",
            'nd.max' => "No es permitido mas de 30 caracteres"
        ];
    }
}
