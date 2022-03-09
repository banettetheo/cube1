<?php


namespace App\Repositories;

use App\Models\Type_ressource;

class TypeRessourceRepository{

    public function all(){
    $lesTypesRessource =  Collect(Type_ressource::all()
      ->map(
        function ($TypesRessource) {
          return [
            'id' => $TypesRessource->id,
            'nom' => $TypesRessource->Nom
          ];
        }
      ));
      return $lesTypesRessource;
    }

}