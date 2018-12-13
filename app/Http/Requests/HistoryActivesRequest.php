<?php

namespace SGLCJUJEDU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryActivesRequest extends FormRequest
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
            'type'        => 'required',
            'active_id'   => 'required',
            'amount'      => 'required|numeric',
            'responsible' => 'required|min:6',
            'date'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'type.required'        => 'Debe seleccionar el Tipo de Historial.',
            'active_id.required'   => 'Debe seleccionar un Activo.',
            'amount.required'      => 'El campo Cantidad es obligatorio.',
            'amount.numeric'       => 'El campo Cantidad debe contener solo números.',
            'responsible.required' => 'El campo Responsable es obligatorio.',
            'responsible.min'      => 'Este campo debe contener al menos 6 carecteres.',
            'date.required'        => 'El campo Fecha es obligatorio.'
        ];
    }
}
