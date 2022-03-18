<?php

namespace App\Http\Requests\Ressource;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRessourceRequest extends FormRequest
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
        $addValue=[];
        $key = 'required';
        if($this->method()=='PUT'){
            $key= 'sometimes';
            $addValue = ['IdEtat' => $key . '|integer|between:1,3'];
        }
        $value = [
            'Titre' => $key . '|max:255|min:5',
            'Contenue' => $key . '|max:255|min:10',
            'IdCategorie' => $key . '|integer',
            'IdType' => $key . '|integer',
            'Lien_ressources' => $key . '|max:255',
        ];

        $result = array_merge($value, $addValue);
        return $result;
    }

    public function messages()
    {
        return[
            'Titre.required'=>'Le titre est requis',
            'Contenue.required'=>'Le contenu est requis',
            'IdCategorie.required'=>'La catégorie est requis',
            'IdUtilisateur_createur.required'=>'L\'utilisateur est requis',
            'IdType.required'=>'Le type est requis',
            'Lien_ressources.required'=>'L\'url est requis'
        ];
    }
}
