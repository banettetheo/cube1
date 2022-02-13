<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\RessourcesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //    return view('welcome');
    //});
    
    //Accueil
    Route::get('/',[AccueilController::class, 'accueil']);
    
    //Authentification
    Route::get('/inscription',[AuthentificationController::class, 'inscription']);
    Route::get('/connexion',[AuthentificationController::class, 'connexion']);
    Route::get('/deconnexion',[AuthentificationController::class, 'deconnexion']);

    //Ressources
    Route::get('/ressources',[RessourcesController::class, 'consulterLesRessources']);
    Route::get('/ressources/{id}',[RessourcesController::class, 'consulterUneRessource']);
    Route::get('/ressources/creer',[RessourcesController::class, 'creer']);
    Route::get('/ressources/{id}/modifier',[RessourcesController::class, 'modifier']);
    Route::get('/ressources/{id}/supprimer',[RessourcesController::class, 'supprimer']);
    

    //Compte
    Route::get('/gestion/utilisateurs',[CompteController::class, 'consulterLesUtilisateurs']);
    Route::get('/gestion/utilisateurs/citoyens',[CompteController::class, 'consulterLesCitoyens']);
    Route::get('/gestion/utilisateurs/citoyens/{id}/desactiver',[CompteController::class, 'desactiverCitoyen']);
    Route::get('/gestion/utilisateurs/citoyens/{id}/reactiver',[CompteController::class, 'reactiverCitoyen']);
    Route::get('/gestion/utilisateurs',[CompteController::class, 'consulterLesUtilisateurs']);




