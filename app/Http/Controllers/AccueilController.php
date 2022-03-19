<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Ressources;
use App\Models\Type_ressource;
use App\Models\User;
use App\Repositories\RessourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AccueilController extends Controller
{

    private $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
        $this->ressourceRepository = $ressourceRepository;
    }

    public function index()
    {
        //Récupération des ressources
        $request = Request::create('/api/ressources', 'GET', []);
        $responseRessources = Route::dispatch($request)->getContent();

        //Récupération des types de ressource
        $request = Request::create('/api/types-ressources', 'GET', []);
        $responseTypesRessources = Route::dispatch($request)->getContent();

        //Récupération des catégories
        $request = Request::create('/api/types-ressources', 'GET', []);
        $responseCategories = Route::dispatch($request)->getContent();



        $lesRessources = json_decode($responseRessources, true);
        $lesTypesRessources = json_decode($responseTypesRessources, true);
        $lesCategories = json_decode($responseTypesRessources, true);







        $lesCategories = Categorie::all()
            ->map(function ($categorie) {
                return [
                    'id' => $categorie->id,
                    'nom' => $categorie->Nom
                ];
            });



        $lesUtilisateurs = User::all()
            ->map(function ($utilisateur) {
                return [
                    'id' => $utilisateur->id,
                    'name' => $utilisateur->name,
                    'Prenom' => $utilisateur->Prenom
                ];
            });

        $responsecode = 200;

        $header = array(
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );


        return view('accueil', [
            'ressources' => $lesRessources,
            'categories' => $lesCategories,
            'typesRessources' => $lesTypesRessources,
            'utilisateurs' => $lesUtilisateurs
        ]);
    }
}
