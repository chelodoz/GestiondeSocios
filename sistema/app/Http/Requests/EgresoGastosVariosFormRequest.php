<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresoGastosVariosFormRequest extends FormRequest
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
            'importe_detalle_egreso'=>'',
            'fecha_detalle_egreso'=>'',

            'nombre_egreso'=>'',
            'descripcion_detalle_egreso'=>'',
            'estado_egreso'=>''
        ];
    }
}
