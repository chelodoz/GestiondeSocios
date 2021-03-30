<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministracionPersonalFormRequest extends FormRequest
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
        'nombre_personal'=>'required|max:50',
        'apellido_personal'=>'required|max:50',
        'tipo_documento_personal'=>'required',
        'num_documento_personal'=>'required',
        'telefono_personal'=>'max:20',
        'celular_personal'=>'required|max:20',
        'correo_personal'=>'max:256',
        'id_cat_organizacion'=>'required'
        ];
    }
}
