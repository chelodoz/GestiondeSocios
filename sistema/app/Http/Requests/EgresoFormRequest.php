<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresoFormRequest extends FormRequest
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
        'nombre_egreso'=>'required|max:50',
        'descripcion_egreso'=>'required|max:256',
        'fecha_hora_egreso'=>'required',
        'importe_detalle_egreso'=>'required',
        'id_egreso'=>'',
        'id_personal'=>'',
        'id_taller'=>'',
        'tipo_detalle_egreso'=>''

        ];
    }
}
