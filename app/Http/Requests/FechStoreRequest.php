<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FechStoreRequest extends FormRequest
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
            'di' => "required|date",
            'df' => "required|date",

        ];
    }

    public function messages()
    {
        return [
            'di.required' => "El campo no puede estar vacío",
            'di.date' => "Fecha invalida!",
            'df.date' => "Fecha invalida!",
            'df.required' => "El campo no puede estar vacío",

        ];
    }

}
