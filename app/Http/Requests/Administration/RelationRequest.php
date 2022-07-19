<?php

namespace App\Http\Requests\Administration;

use Illuminate\Foundation\Http\FormRequest;

class RelationRequest extends FormRequest
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
            'Nom' => 'required|string|max:50|min:2',
        ];
    }

    public function messages()
    {
        return[
            'Nom.required'=>'Le nom est requis',
            'Nom.string'=>'Le nom doit être une chaîne de caractère',
            'Nom.max'=>'Le nom ne doit pas exceder 50 caractères',
            'Nom.min'=>'Le nom doit faire au moins 2 caractères ',
        ];
    }
}
