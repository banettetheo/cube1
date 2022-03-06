<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Ressources;
use App\Models\Type_ressource;
use App\Models\Utilisateur;
use App\Repositories\RessourceRepository;
use Illuminate\Http\Request;

class AccueilController extends Controller
{

    private $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
        $this->ressourceRepository = $ressourceRepository;
    }

    public function index(){

        $lesRessources = $this->ressourceRepository->all();

        $lesCategories = Categorie::all()
        ->map(function ($categorie) {
            return [
                'id' => $categorie->id,
                'nom' => $categorie->Nom
            ];
        });


        $lesTypesRessource = Type_ressource::all()
            ->map(function ($typeRessource) {
            return [
                'id' => $typeRessource->id,
                'nom' => $typeRessource->Nom
            ];
        });
        $lesUtilisateurs = Utilisateur::all()
        ->map(function ($utilisateur) {
            return [
                'id' => $utilisateur->id,
                'nom' => $utilisateur->Nom,
                'prenom' => $utilisateur->Prenom
            ];
        });


        return view('accueil', [
            'ressources' => $lesRessources,
            'categories' => $lesCategories,
            'typesRessource' => $lesTypesRessource,
            'utilisateurs' => $lesUtilisateurs
        ]);
    }


}
