<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TallerFormRequest extends FormRequest
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
        'nombre_taller'=>'required|max:20',
        'descripcion_taller'=>'required|max:256',
        'cuota_taller'=>'required|numeric|digits_between:1,10'
        ];
    }
}
