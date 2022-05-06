<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapaStoreRequest extends FormRequest
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
            'c' => "required|regex:/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/u|max:10|min:1",
        ];
    }

    public function messages()
    {
        return [
            'c.required' => "El campo no puede estar vacío",
            'c.max' => "No es permitido mas de 10 caracteres",
            'c.min' => "No es permitido menos de 1 caracter"

        ];
    }
}
