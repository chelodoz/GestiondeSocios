<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministracionCuotaOrganizacionFormRequest extends FormRequest
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
        'cuota_fija_administracion'=>'required|numeric',
        'fecha_cuota_fija_inicio_administracion'=>'required',
        'fecha_cuota_fija_fin_administracion'=>'required',     
        ];
    }
}
