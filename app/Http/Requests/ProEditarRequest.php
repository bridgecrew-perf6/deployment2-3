<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProEditarRequest extends FormRequest
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
            'p' => "required|max:30",
        ];
    }

    public function messages()
    {
        return [
            'p.required' => "El campo no puede estar vacío",
            'p.max' => "No es permitido mas de 30 caracteres"
        ];
    }
}
