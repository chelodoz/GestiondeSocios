<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoCuotaOrganizacionFormRequest extends FormRequest
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
             'importe_detalle_ingreso'=>'required',
             'mes_detalle_ingreso'=>'required',
             'descuento_detalle_ingreso'=>'required',
             ];
    }
}
