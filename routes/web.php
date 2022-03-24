<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\API\RessourceAPIController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Moderateur\RessourceValidationController;
use App\Http\Controllers\UtilisateurController;
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



//Accueil
Route::get('/',[AccueilController::class, 'index'])->name('accueil');
route::get('utilisateurs/{id}', [RelationController::class, 'create'])->name('utilisateur.consulter');
route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');


Route::middleware('auth')->group(function () {

    //Ressources
    // Route::post('/', [RessourceController::class, 'store'])->name('ressources.store');
    Route::resource('ressources', RessourceController::class)->except(['index',"show"]);

    //Compte
    Route::get('mon-compte',[CompteController::class, 'index'])->name('monCompte');

    //Commentaires
    route::post('ressources/{id}', [CommentaireController::class, 'store'])->name('commentaires.store');
    route::delete('commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');


    //Modération
    Route::resource('moderateur/ressources-a-valider', RessourceValidationController::class);
    
    //Relations
    route::post('utilisateurs/{id}', [RelationController::class, 'store'])->name('relations.store');
    Route::resource('mon-compte/relations', RelationController::class)->except(['create','store']);

});

// Route::get('/mon-compte', [CompteController::class, 'monCompte'])->middleware(['auth'])->name('monCompte');

require __DIR__.'/auth.php';

    
// //Authentification
// Route::get('/inscription',[AuthentificationController::class, 'inscription']);
// Route::get('/connexion',[AuthentificationController::class, 'connexion']);
// Route::get('/deconnexion',[AuthentificationController::class, 'deconnexion']);


//Comptes
//Route::get('/mon-compte',[CompteController::class, 'monProfil']);




route::resource('utilisateur', UtilisateurController::class)->only(['show']);