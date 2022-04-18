<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionStoreRequest extends FormRequest
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
            'num_fiche' => ['required', 'integer'],  
            'matricule_medecin' => ['required', 'integer'],
            'medicament_id' => ['required', 'integer'],
            'service' => ['required', 'string'],
            'qty_med_presc' => ['required', 'integer'],
            'date_prescr' => ['required', 'date'],
            'statut' => ['required', 'string'],
        ];

    }
}
