<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntreeStoreRequest extends FormRequest
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
            'medicament_id' => ['required', 'integer'],
            'fournisseur_id' => ['required', 'integer'],
            'qty_ee'=>  ['required', 'integer'],
            'date_exp'=>  ['required', 'date'],
            'date_appro'=>  ['required', 'date'],
            'num_lot'=>  ['required', 'string']
        ]; 
    }
}
