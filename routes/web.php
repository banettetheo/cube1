<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\API\RessourceAPIController;
use App\Http\Controllers\Moderateur\RessourceValidationController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\ChangerMdpController;

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

Route::middleware('auth')->group(function () {
    //Ressources
    // Route::post('/', [RessourceController::class, 'store'])->name('ressources.store');
    Route::resource('ressources', RessourceController::class)->except(['index']);

    //Compte
    Route::get('mon-compte',[CompteController::class, 'index'])->name('monCompte');


    //Modération
    Route::resource('moderateur/ressources-a-valider', RessourceValidationController::class);
    
    //Relations
    Route::resource('relations', RelationController::class);

});



// BACK - OFFICE ==============
    Route::get('administration/connexion', [AuthenticatedSessionController::class, 'create'])
    ->name('administrateur.login');

    Route::post('administration/connexion', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth')->group(function () {
    //Back_office
    // Route::post('/', [RessourceController::class, 'store'])->name('ressources.store');
    Route::resource('ressources', RessourceController::class)->except(['index']);

    //Compte
    Route::get('mon-compte',[CompteController::class, 'index'])->name('monCompte');


    //Modération
    Route::resource('moderateur/ressources-a-valider', RessourceValidationController::class);
    
    //Relations
    Route::resource('relations', RelationController::class);

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