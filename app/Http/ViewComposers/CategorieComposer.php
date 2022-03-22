<?php

namespace App\Http\ViewComposers;

use App\Models\Categorie;
use Illuminate\View\View;

class CategorieComposer
{
  public function compose(View $view)
  {
    $view->with('categories', Categorie::all()
      ->map(
        function ($categorie) {
          return [
            'id' => $categorie->id,
            'nom' => $categorie->Nom
          ];
        }
      ));
  }
}
