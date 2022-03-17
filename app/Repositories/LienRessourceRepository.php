<?php


namespace App\Repositories;

use App\Models\Commentaire;
use App\Models\Jointure_ress_utilisateur;
use App\Models\Ressources;

class LienRessourceRepository
{
    private $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
        $this->ressourceRepository = $ressourceRepository;
    }

    public function findByIdRessource(int $id){
        $lesLienRessource = Jointure_ress_utilisateur::where('IdRessource',$id)->get();
        return $lesLienRessource;
    }

    public function findRessourceByIdUser(int $id){
        $lesLienRessource = Jointure_ress_utilisateur::where('IdUtilisateur',$id)
        ->get()
        ->map(function ($uneJointure) {
            $uneRessource= $this->ressourceRepository->findById($uneJointure->IdRessource);
            $info = ['typeDeRessource' => 'partagee'];
            $result = array_merge($info, $uneRessource);
            return $result;
        });;
        return $lesLienRessource;
    }

    public function all(){
        $lesLienRessource = Collect(Jointure_ress_utilisateur::all());
        return $lesLienRessource;
    }

}