<?php

namespace SGLCJUJEDU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivesRequest extends FormRequest
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
            'category_active_id' => 'required',
            'item_id'            => 'required',
            'name'               => 'required',
            'unit'               => 'required',
            'stock'              => 'required|numeric',
            'location_id'        => 'required',
            'state'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_active_id.required' => 'Debe seleccionar una Categoria.',
            'item_id.required'            => 'Debe seleccionar una Partida.',
            'name.required'               => 'El campo Nombre es obligatorio.',
            'unit.required'               => 'Debe seleccionar una Unidad.',
            'stock.required'              => 'El campo Stock es obligatorio.',
            'stock.numeric'               => 'El campo Stock debe contener solo números.',
            'location_id.required'        => 'Debe seleccionar una  Ubicación.',
            'state.required'              => 'Debe seleccionar un Estado.'
        ];
    }
}
