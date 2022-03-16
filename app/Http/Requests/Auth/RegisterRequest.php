<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'prenom' => 'required|max:50|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|confirmed',
        ];
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
