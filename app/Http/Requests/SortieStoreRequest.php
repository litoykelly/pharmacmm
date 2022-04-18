<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortieStoreRequest extends FormRequest
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
            'prescription_id' => ['required', 'string'],
            //'id_med_sous'=> ['required', 'integer'],qty_med_presc
            'qty_med_presc'=>  ['required', 'integer'],
            'qty_sortie'=>  ['required', 'string'],
            'date_sortie'=>  ['required', 'string']
        ];
    }
}
