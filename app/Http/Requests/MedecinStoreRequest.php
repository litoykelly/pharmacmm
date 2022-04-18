<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedecinStoreRequest extends FormRequest
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
            'matricule_medecin' => ['required', 'string'],
            'nom_medecin'=>  ['required', 'string'],
            'grade_medecin'=>  ['required', 'string'],
            'fonction_medecin'=>  ['required', 'string'],
        ];
    }
}
