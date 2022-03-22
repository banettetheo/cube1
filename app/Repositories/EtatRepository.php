<?php


namespace App\Repositories;

use App\Models\Etat;

class EtatRepository{

    public function all(){
    $lesEtats =  Collect(Etat::all()
      ->map(
        function ($etat) {
          return [
            'id' => $etat->id,
            'nom' => $etat->Nom
          ];
        }
      ));
      return $lesEtats;
    }

    public function getEtatById($id){
        $etat = Etat::findOrFail($id);
        $etatFormat = $this->formatEtat($etat);
        return $etatFormat;
    }


    public function formatEtat(Etat $unEtat){
        return [
            'id' => $unEtat->id,
            'nom' => $unEtat->Nom,
        ];
    }

    public function getEtatAccesModifUtilisateur(){
        $lesEtats = array();
        array_push($lesEtats, $this->getEtatById(1));
        array_push($lesEtats, $this->getEtatById(2));
        array_push($lesEtats, $this->getEtatById(3));
        return $lesEtats;
    }

}