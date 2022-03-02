<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Ressources;
use App\Models\Type_ressource;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(){
        $lesRessources = Collect(Ressources::all()
            ->sortByDesc('created_at')
            ->take(100));


        $lesCategories = Categorie::all();
        $lesTypesRessource = Type_ressource::all();
        $lesUtilisateurs = Utilisateur::all();


        return view('accueil', [
            'ressources' => $lesRessources,
            'categories' => $lesCategories,
            'types_ressource' => $lesTypesRessource,
            'utilisateur' => $lesUtilisateurs
        ]);
    }


}
