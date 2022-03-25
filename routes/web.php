<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Administrateur\AccueilController as AdministrateurAccueilController;
use App\Http\Controllers\Administrateur\CategorieController;
use App\Http\Controllers\Administrateur\TableauBordController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\API\RessourceAPIController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Moderateur\RessourceValidationController;
use App\Http\Controllers\Administrateur\UtilisateurController;
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


Route::middleware('guest')->group(function () {
    Route::get('/', [AccueilController::class, 'index'])->name('accueil');
    route::get('utilisateurs/{id}', [RelationController::class, 'create'])->name('utilisateur.consulter');
    route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');
});
//Accueil



// Route::middleware('auth')->group(function () {
Route::group(['middleware' => ['auth', 'user.confirm']], function () {
    Route::get('/', [AccueilController::class, 'index'])->name('accueil');
    route::get('utilisateurs/{id}', [RelationController::class, 'show'])->name('utilisateur.consulter');
    route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');
    //Ressources
    // Route::post('/', [RessourceController::class, 'store'])->name('ressources.store');
    Route::resource('mon-compte/ressources', RessourceController::class)->except(['index', "show"]);

    //Compte
    Route::get('mon-compte', [CompteController::class, 'index'])->name('monCompte');

    //Commentaires
    route::post('ressources/{id}', [CommentaireController::class, 'store'])->name('commentaires.store');
    route::delete('commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');


    //Modération
    Route::resource('moderateur/ressources-a-valider', RessourceValidationController::class);

    //Relations
    route::post('utilisateurs/{id}', [RelationController::class, 'store'])->name('relations.store');
    Route::resource('mon-compte/relations', RelationController::class)->except(['create', 'store']);
});



// BACK - OFFICE ==============

Route::group(['middleware' => ['auth', 'backoffice']], function () {
    Route::get('administration/panel', [AdministrateurAccueilController::class, 'index'])->name('administration.panel');
    Route::resource('administration/gestion-comptes', UtilisateurController::class, ['as' => 'administration']);
    Route::resource('administration/tableaux-de-bord', TableauBordController::class, ['as' => 'administration']);
    Route::resource('administration/gestion-catalogues/categories', CategorieController::class, ['as' => 'administration.gestion_catalogues']);
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


require __DIR__ . '/auth.php';
