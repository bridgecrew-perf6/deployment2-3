<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
            'name' => 'required|max:30|min:3',
            'cedula' => 'required|max:15|min:7',
            'cargo' => 'required',
            'equipo' => 'required',
            'serial' => 'required',
            'placa' => 'required',
            'observer' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "El campo no puede estar vacío",
            'cedula.required' => "El campo no puede estar vacío",
            'cargo.required' => "El campo no puede estar vacío",
            'equipo.required' => "El campo no puede estar vacío",
            'serial.required' => "El campo no puede estar vacío",
            'placa.required' => "El campo no puede estar vacío",
            'observer.required' => "El campo no puede estar vacío",
            'name.max' => "No es permitido mas de 30 caracteres",
            'name.min' => "Minimo 3 caracteres",
            'name.unique' => "Nombre ya en uso",
            'name.regex' => "Solo letras!",
            'cedula.max' => "Cedula invalida!",
            'cedula.min' => "Cedula invalida!",




        ];
    }
}
