<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MatchOldPassword;



class UStoreRequest extends FormRequest
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
            'password' => "required",
            'old_password' => ['required', new MatchOldPassword],
            'password_confirmation' => "required|same:password",
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "El campo no puede estar vacío",
            'old_password.required' => "El campo no puede estar vacío",
            'password_confirmation.required' => "El campo no puede estar vacío",
            'password_confirmation.same' => "Contraseña no coincide",

            




        ];
    }
}
