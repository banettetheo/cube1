<?php


namespace App\Repositories;

use App\Models\Commentaire;
use App\Models\Jointure_ress_utilisateur;
use App\Models\Ressources;

class LienRessourceRepository
{

    public function findByIdRessource(int $id){
        $lesLienRessource = Jointure_ress_utilisateur::where('IdRessource',$id)->get();
        return $lesLienRessource;
    }

    public function all(){
        $lesLienRessource = Collect(Jointure_ress_utilisateur::all());
        return $lesLienRessource;
    }

}