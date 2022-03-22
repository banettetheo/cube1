<?php


namespace App\Repositories;

use App\Models\Relation;
use App\Models\Type_Relation;

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

    public function one($uneRelation){
        return [
            'id' => $uneRelation->id,
            'typeRelation' => $uneRelation->IdRelation->only('id','Nom'),
            'utilisateur' => $uneRelation->User2->only('id','name','Prenom')
        ];
    }
}
