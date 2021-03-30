<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministracionSocioFormRequest extends FormRequest
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
        'nombre_socio'=>'required|max:20',
        'apellido_socio'=>'required|max:20',
        'fecha_de_nacimiento_socio'=>'required',
        'tipo_documento_socio'=>'required|max:8',
        'num_documento_socio'=>'required|numeric|digits:8',
        'id_descuento'=>'',
        'fecha_inicio_socio_has_descuento'=>'required',
        'fecha_fin_socio_has_descuento'=>'required'
        
        ];
    }
}
