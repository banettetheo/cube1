<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    // private $ressourceRepository;

    // public function __construct(RessourceRepository $ressourceRepository)
    // {
    //     $this->ressourceRepository = $ressourceRepository;
    // }

    public function all()
    {
        $lesUtilisateurs = User::all()
        ->map(function ($utilisateur) {
           return $this->one($utilisateur);
        });
        return $lesUtilisateurs;
    }

    public function getUtilisateur($id){
        $unUtilisateur = User::findOrFail($id)->only('id','name','Prenom','Moderateur');
        return $unUtilisateur;
    }

    public function one(User $unUser){
        return [
            'id' => $unUser->id,
            'name' => $unUser->name,
            'Prenom' => $unUser->Prenom
        ];

    }

}
