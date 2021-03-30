<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioFormRequest extends FormRequest
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


        //Familia
        'nombre_padre_familia'=>'max:20',
        'nombre_madre_familia'=>'max:20',
        'nombre_tutor_familia'=>'max:20',
        'telefono_familia'=>'required|numeric|digits_between:10,11',
        'celular_familia'=>'required|numeric|digits_between:10,11',

        //Domicilio
        'direccion_domicilio'=>'required|max:50',
        'nombre_provincia_domicilio'=>'required|max:20',
        'nombre_localidad_domicilio'=>'required|max:20',
        'codigo_postal_domicilio'=>'required|max:7',

        //Institucion
        'nombre_institucion'=>'required|max:20',
        'domicilio_institucion'=>'required|max:50',
        'grado_institucion'=>'required|max:10'
        
        ];
    }
}
