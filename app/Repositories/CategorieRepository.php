<?php


namespace App\Repositories;

use App\Models\Categorie;

class CategorieRepository{

    public function all(){
    $lesCategories =  Collect(Categorie::all()
      ->map(
        function ($categorie) {
          return [
            'id' => $categorie->id,
            'nom' => $categorie->Nom
          ];
        }
      ));
      return $lesCategories;
    }

}