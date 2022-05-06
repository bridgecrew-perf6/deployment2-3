<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => "required|max:30",
            'phone' => "required|numeric|max:10000000000|min:5",
            'email' => "required|email",
            'city' => "required|max:20",
            'type' => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El campo no puede estar vacío",
            'name.max' => "No es permitido mas de 30 caracteres",
            'phone.required' => "El campo no puede estar vacío",
            'phone.numeric' => "Solo numeros",
            'phone.max' => "Numero invalido!",
            'phone.min' => "Numero invalido!",
            'email.required' => "El campo no puede estar vacío",
            'email.email' => "Solo correo electronico",
            'city.required' => "El campo no puede estar vacío",
            'city.max' => "No es permitido mas de 30 caracteres",
            'type.required' => "El campo no puede estar vacío",




        ];
    }
}
