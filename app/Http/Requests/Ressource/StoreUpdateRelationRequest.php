<?php

namespace App\Http\Requests\Ressource;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRelationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //A configurer une fois l'authentification de faite
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
            'IdTypeRelation' => 'required|integer|max:5',
        ];

    }

    public function messages()
    {
        return [
            
            'IdTypeRelation.required' => 'Vous devez renseigner un type de relation'
        ];
    }

    // public $validator = null;
    // protected function failedValidation(Validator $validator)
    // {
    //     $this->validator = $validator;
    // }
}
