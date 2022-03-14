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
            'contenu' => 'required|max:255|min:10',
            'idCategorie' => 'required|integer',
            'idUtilisateur' =>'required|integer',
            'idType' => 'required|integer',
            'url' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return[
            'titre.required'=>'Le titre est requis',
            'contenu.required'=>'Le contenu est requis',
            'idCategorie.required'=>'La catégorie est requis',
            'idType.required'=>'Le type est requis',
            'url.required'=>'L\'url est requis'
        ];
    }
}
