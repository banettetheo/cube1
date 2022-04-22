<?php


namespace App\Repositories;

use App\Models\Relation;
use App\Models\Type_Relation;
use App\Models\User;

class RelationRepository
{
    // private $ressourceRepository;

    // public function __construct(RessourceRepository $ressourceRepository)
    // {
    //     $this->ressourceRepository = $ressourceRepository;
    // }

    public function all(int $idUtilisateur)
    {
        $lesRelations = Relation::where('IdUser1', $idUtilisateur)
            ->get()
            ->map(function ($uneRelation) {
                return $this->one($uneRelation);
            });;
        return $lesRelations;

    }

    
    public function allUsers()
    {
        $lesUtilisateurs = User::where(['Admin'=>0, 'SuperAdmin'=>0])->get()
            ->map(function ($unUtilisateur) {
                return[
                    'id'=>$unUtilisateur->id,
                    'nom'=>$unUtilisateur->name,
                    'prenom'=>$unUtilisateur->Prenom,
                    'email'=>$unUtilisateur->email,
                    'ban'=>$unUtilisateur->Compte_ban,
                ];
            });
        return $lesUtilisateurs;

    }

    public function one($uneRelation){
        return [
            'id' => $uneRelation->id,
            'typeRelation' => $uneRelation->IdRelation->only('id','Nom'),
            'utilisateur' => $uneRelation->User2->only('id','name','Prenom')
        ];
    }

    public function verifExistanceRelation(int $idUser1 , int $idUser2){
        $laRelation = Relation::where(['IdUser1'=>$idUser1, 'IdUser2' => $idUser2])->get();
        return $laRelation;
    }


    public function getUtilisateurRelation(int $idRelation){
        $uneRelation = Relation::findOrFail($idRelation)->only('IdUser1');
        return $uneRelation['IdUser1'];
    }


    public function getAllTypes(){
        $lesTypes = Type_Relation::all()
        ->map(function ($unType) {
            return [
                'id' => $unType->id,
                'nom' => $unType->Nom,
            ];
        });
        return $lesTypes;
    }
}
