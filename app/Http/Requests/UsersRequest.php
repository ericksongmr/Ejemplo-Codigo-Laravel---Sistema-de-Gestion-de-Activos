<?php

namespace SGLCJUJEDU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'     => 'required|min:6',
            'email'    => 'required|email|unique:mysql.users',
            'password' => 'required|min:6',
            'type'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'El campo Nombre es obligatorio.',
            'email.required'    => 'El campo E-mail es obligatorio.',
            'email'             => 'El campo E-mail no corresponde con una dirección de e-mail válida.',
            'email.unique'      => 'Esta dirección E-mail ya está en uso.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'type.required'     => 'Debe seleccionar un Tipo de Usuario.',
            'min'               => 'Este campo debe contener al menos 6 caracteres.'
        ];
    }
}
