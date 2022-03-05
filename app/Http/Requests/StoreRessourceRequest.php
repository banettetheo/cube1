<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRessourceRequest extends FormRequest
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
            'titre' => 'required|max:255|min:5',
            'content' => 'required|max:255|min:10',
            'categorie' => 'required|integer',
            //'idUtilisateur' =>'required|integer',
            'type' => 'required|integer',
            'url' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return[
            'titre.required'=>'Le titre est requis',
            'content.required'=>'Le contenu est requis',
            'categorie.required'=>'La catégorie est requis',
            'type.required'=>'Le type est requis',
            'url.required'=>'L\'url est requis'
        ];
    }
}
