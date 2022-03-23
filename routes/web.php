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
route::get('utilisateurs/{id}', [RelationController::class, 'create'])->name('utilisateur.consulter');


Route::middleware('auth')->group(function () {
    //Ressources
    // Route::post('/', [RessourceController::class, 'store'])->name('ressources.store');
    Route::resource('ressources', RessourceController::class)->except(['index']);

    //Compte
    Route::get('mon-compte',[CompteController::class, 'index'])->name('monCompte');


    //Modération
    Route::resource('moderateur/ressources-a-valider', RessourceValidationController::class);
    
    //Relations
    route::post('utilisateurs/{id}', [RelationController::class, 'store'])->name('relations.store');
    Route::resource('mon-compte/relations', RelationController::class)->except(['create','store']);

});



// BACK - OFFICE ==============
Route::middleware('guest')->group(function () {

    Route::get('administration/connexion', [AuthenticatedSessionController::class, 'create']);
});

// Route::middleware('auth')->group(function () {
//     //Compte
//     Route::get('administration/accueil',[AccueilController::class, 'indexAdmin'])->name('admin.accueil');
//     Route::get('administration/gestion-comptes',[CompteController::class, 'index'])->name('admin.gestionComptes');

//     Route::get('administration/gestion-catalogues',[CompteController::class, 'index'])->name('admin.gestionCatalogues');
//     Route::get('administration/gestion-catalogues/categories',[CategorieController::class, 'index'])->name('admin.gestionCatalogues.categories');
//     Route::get('administration/gestion-catalogues/types-ressource',[CompteController::class, 'index'])->name('admin.gestionCatalogues.typesRessource');
//     Route::get('administration/tableaux-de-bords',[StatistiquesController::class, 'index'])->name('admin.tableauxBords');
//     Route::get('administration/gestion-ressources',[RessourcesController::class, 'index'])->name('admin.gestionRessources');
//     Route::get('administration/gestion-relations',[RelationController::class, 'index'])->name('admin.gestionRelations');
//     Route::get('administration/super-admin',[SuperAdminController::class, 'index'])->name('admin.superAdmin');


// });

// Route::get('/mon-compte', [CompteController::class, 'monCompte'])->middleware(['auth'])->name('monCompte');

require __DIR__.'/auth.php';

    
// //Authentification
// Route::get('/inscription',[AuthentificationController::class, 'inscription']);
// Route::get('/connexion',[AuthentificationController::class, 'connexion']);
// Route::get('/deconnexion',[AuthentificationController::class, 'deconnexion']);


//Comptes
//Route::get('/mon-compte',[CompteController::class, 'monProfil']);




route::resource('utilisateur', UtilisateurController::class)->only(['show']);