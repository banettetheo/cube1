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
Route::get('/',[AccueilController::class, 'index']);
    
//Authentification
Route::get('/inscription',[AuthentificationController::class, 'inscription']);
Route::get('/connexion',[AuthentificationController::class, 'connexion']);
Route::get('/deconnexion',[AuthentificationController::class, 'deconnexion']);


//Comptes
Route::get('/compte/mon-profil',[CompteController::class, 'monProfil']);


//Ressources
// Route::get('/ressources',[RessourcesController::class, 'consulterLesRessources']);
Route::get('/ressources/{id}',[RessourcesController::class, 'consulterUneRessource']);
Route::get('/ressources/creer',[RessourcesController::class, 'creer']);
Route::get('/ressources/modifier/{id}',[RessourcesController::class, 'modifier']);
Route::get('/ressources/supprimer/{id}',[RessourcesController::class, 'supprimer']);
    

//Compte
// Route::get('/gestion/utilisateurs',[CompteController::class, 'consulterLesUtilisateurs']);
// Route::get('/gestion/utilisateurs/citoyens',[CompteController::class, 'consulterLesCitoyens']);
// Route::get('/gestion/utilisateurs/citoyens/{id}/desactiver',[CompteController::class, 'desactiverCitoyen']);
// Route::get('/gestion/utilisateurs/citoyens/{id}/reactiver',[CompteController::class, 'reactiverCitoyen']);
// Route::get('/gestion/utilisateurs',[CompteController::class, 'consulterLesUtilisateurs']);


Route::resource('utilisateurmodel', 'UtilisateurModelController');
Route::resource('favorismodel', 'FavorisModelController');
Route::resource('relationmodel', 'RelationModelController');
Route::resource('type_relationmodel', 'Type_relationModelController');
Route::resource('commentairemodel', 'CommentaireModelController');
Route::resource('ressourcesmodel', 'RessourcesModelController');
Route::resource('categoriemodel', 'CategorieModelController');
Route::resource('jru', 'JRUController');
