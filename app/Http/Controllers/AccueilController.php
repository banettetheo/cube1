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

    public function index(Request $request)
    {
        $default = $request;
        //Récupération des ressources
        $request = Request::create('/api/ressources', 'GET', []);
        $responseRessources = Route::dispatch($request)->getContent();

        //Récupération des types de ressource
        $request = Request::create('/api/types-ressources', 'GET', []);
        $responseTypesRessources = Route::dispatch($request)->getContent();

        //Récupération des catégories
        $request = Request::create('/api/categories', 'GET', []);
        $responseCategories = Route::dispatch($request)->getContent();



        $lesRessources = json_decode($responseRessources, true);
        $lesTypesRessources = json_decode($responseTypesRessources, true);
        $lesCategories = json_decode($responseCategories, true);



        $lesUtilisateurs = User::all()
            ->map(function ($utilisateur) {
                return [
                    'id' => $utilisateur->id,
                    'name' => $utilisateur->name,
                    'Prenom' => $utilisateur->Prenom
                ];
            });


        return view('accueil', [
            'ressources' => $lesRessources,
            'categories' => $lesCategories,
            'typesRessources' => $lesTypesRessources,
            'utilisateurs' => $lesUtilisateurs,
        ]);
    }

    public function utilisateurs(){
        $lesUtilisateurs = User::all()
        ->map(function ($utilisateur) {
            return [
                'id' => $utilisateur->id,
                'name' => $utilisateur->name,
                'Prenom' => $utilisateur->Prenom
            ];
        });
        return view('accueilUtilisateurs', [
            'utilisateurs' => $lesUtilisateurs,
        ]);
    }

}
