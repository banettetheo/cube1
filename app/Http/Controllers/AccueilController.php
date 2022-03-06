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
