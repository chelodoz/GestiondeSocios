<?php

namespace sistema\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Detalle_TallerFormRequest extends FormRequest
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
        'id_personal'=>'required|max:20',
        'importe_taller_personal'=>'required|numeric|digits_between:1,10',
    ];
    }
}
