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
            'phone' => "required|number",
            'email' => "required|email",
            'password' => "required",
            'ciudad' => "required|max:20",
            'type' => "required",
            'foto' => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El campo no puede estar vacío",
            'name.max' => "No es permitido mas de 30 caracteres",
            'phone.required' => "El campo no puede estar vacío",
            'phone.number' => "Solo numeros",
            'email.required' => "El campo no puede estar vacío",
            'email.email' => "Solo correo electronico",
            'ciudad.required' => "El campo no puede estar vacío",
            'ciudad.max' => "No es permitido mas de 30 caracteres",
            'type.required' => "El campo no puede estar vacío",
            'foto.required' => "El campo no puede estar vacío",




        ];
    }
}
