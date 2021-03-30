<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresoPagoPersonalFormRequest extends FormRequest
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
            'id_taller'=>'',
            'id_egreso'=>'',
            'id_personal'=>'',

            //detalle_personal
            'cuota_detalle_personal'=>'',

            //cat_organizacion
            'id_cat_organizacion'=>'',
            //checkbox
            'mes.1' => 'in:1',
            'mes.2' => 'in:2',
            'mes.3' => 'in:3',
            'mes.4' => 'in:4',
            'mes.5' => 'in:5',
            'mes.6' => 'in:6',
            'mes.7' => 'in:7',
            'mes.8' => 'in:8',
            'mes.9' => 'in:9',
            'mes.10' => 'in:10',
            'mes.11' => 'in:11',
            'mes.12' => 'in:12'
            
 
        ];
    }
}
