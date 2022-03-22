<?php

namespace App\Http\ViewComposers;

use App\Models\Type_ressource;
use Illuminate\View\View;

class TypeRessourceComposer
{
  public function compose(View $view)
  {
    $view->with('types', Type_ressource::all()
    ->map(function ($type){
      return [
        'id' => $type->id,
        'nom' => $type->Nom
      ];
    }
  ));
  }
}
