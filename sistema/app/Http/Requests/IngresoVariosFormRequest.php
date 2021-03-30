<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoVariosFormRequest extends FormRequest
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
            //

            'nombre_detalle_ingreso'=>'',
            'concepto_detalle_ingreso'=>'',
            'descripcion_detelle_ingreso'=>'',
            'importe_detalle_ingreso'=>'',
            'id_ingreso'=>'',
            'fecha_detalle_ingreso'=>''
        ];
    }
}
