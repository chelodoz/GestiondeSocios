<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresoPagoProfesionalFormRequest extends FormRequest
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
            'nombre_egreso'=>'',
            'descripcion_egreso'=>'',
            'estado_egreso'=>'',

            //detalle_egreso
            'importe_detalle_egreso'=>'',
            'fecha_detalle_egreso'=>'',
            'id_egreso'=>'',
            'id_personal'=>''
        ];
    }
}
