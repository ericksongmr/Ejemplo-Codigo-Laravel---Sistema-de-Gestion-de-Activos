<?php

namespace SGLCJUJEDU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsRequest extends FormRequest
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
            'description'     => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'El campo Descripción es obligatorio.',
            'min'                  => 'Este campo debe contener al menos 6 caracteres.'
        ];
    }
}
