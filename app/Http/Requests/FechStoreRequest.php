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
            'di' => "required",
            'df' => "required",

        ];
    }

    public function messages()
    {
        return [
            'di.required' => "El campo no puede estar vacío",
            'df.required' => "El campo no puede estar vacío",

        ];
    }

}
