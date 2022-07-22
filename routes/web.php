<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Administrateur\AccueilController as AdministrateurAccueilController;
use App\Http\Controllers\Administrateur\CategorieController;
use App\Http\Controllers\Administrateur\TableauBordController;
use App\Http\Controllers\Administrateur\TypeRelationController;
use App\Http\Controllers\Administrateur\TypesRessourceController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\API\RessourceAPIController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Moderateur\RessourceValidationController;
use App\Http\Controllers\Administrateur\UtilisateurController;
use App\Http\Controllers\API\TypeRessourceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\ChangerMdpController;
use App\Http\Controllers\GestionRessources;
use App\Models\Categorie;

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

//For all
Route::get('/', [AccueilController::class, 'index'])->name('accueil');
route::get('ressources/publique/{id}', [RessourceController::class, 'showPublique'])->name('ressources.show.publique');
Route::get('/utilisateurs', [AccueilController::class, 'utilisateurs'])->name('accueil-utilisateurs');



Route::middleware('guest')->group(function () {
    route::get('utilisateurs/{id}', [RelationController::class, 'create'])->name('utilisateur.consulter');
    route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');
});
//Accueil



// FRONT - OFFICE ==============
Route::group(['middleware' => ['auth', 'user.confirm']], function () {
    route::get('utilisateurs/{id}', [RelationController::class, 'show'])->name('utilisateur.consulter');
    route::get('utilisateurs/zjouter/{id}', [RelationController::class, 'show'])->name('utilisateur.ajouter');

    route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');
    //Ressources
    // Route::post('/', [RessourceController::class, 'store'])->name('ressources.store');
    Route::resource('mon-compte/ressources', RessourceController::class)->except(['index', "show"]);
    route::get('ressources/like/{id}', [RessourceController::class, 'like'])->name('ressources.like');
    route::get('ressources/mettre-de-cote/{id}', [RessourceController::class, 'mettreDeCote'])->name('ressources.mettre-de-cote');
    route::get('ressources/ajouter-au-favoris/{id}', [RessourceController::class, 'ajoutAuxFavoris'])->name('ressources.ajout-aux-favoris');
    //Suppression
    route::get('ressources/retirer-mise-de-cote/{id}', [RessourceController::class, 'retirerMiseDeCote'])->name('ressources.mettre-de-cote.destroy');
    route::get('ressources/retirer-favoris/{id}', [RessourceController::class, 'retirerFavoris'])->name('ressources.ajout-aux-favoris.destroy');

    //Gestion des ressources (Visibilite)
    route::get('mon-compte/ressources-mises-de-cote', [GestionRessources::class, 'getMisesDeCote'])->name('mon-compte.mis-de-cote');
    route::get('mon-compte/ressources-favoris', [GestionRessources::class, 'getFavoris'])->name('mon-compte.favoris');


    //Compte
    Route::get('mon-compte/consulter', [CompteController::class, 'index'])->name('monCompte.index');
    Route::get('mon-compte/ressources/publier/{id}', [RessourceValidationController::class, 'publier'])->name('monCompte.publier');

    //Commentaires
    route::post('ressources/{id}', [CommentaireController::class, 'store'])->name('commentaires.store');
    route::delete('commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');


    //Modération
    Route::get('mon-compte/moderateur/ressources-a-valider', [RessourceValidationController::class, 'index'])->name('mon-compte.moderateur.ressources-a-valider.index');
    Route::get('mon-compte/moderateur/ressources-a-valider/lire/{id}', [RessourceValidationController::class, 'show'])->name('mon-compte.moderateur.ressources-a-valider.show');
    Route::get('mon-compte/moderateur/ressources-a-valider/valider/{id}', [RessourceValidationController::class, 'valider'])->name('mon-compte.moderateur.ressources-a-valider.valider');
    Route::get('mon-compte/moderateur/ressources-a-valider/refuser/{id}', [RessourceValidationController::class, 'refuser'])->name('mon-compte.moderateur.ressources-a-valider.refuser');

    //Relations
    route::post('utilisateurs/{id}', [RelationController::class, 'store'])->name('relations.store');
    Route::resource('mon-compte/relations', RelationController::class)->except(['create', 'store']);
});



// BACK - OFFICE ==============

Route::group(['middleware' => ['auth', 'backoffice']], function () {
    Route::get('administration/panel', [AdministrateurAccueilController::class, 'index'])->name('administration.panel');
    Route::resource('administration/gestion-comptes', UtilisateurController::class, ['as' => 'administration']);
    Route::resource('administration/tableaux-de-bord', TableauBordController::class, ['as' => 'administration']);
    
    //Gestion-catalogue/Categories
    Route::resource('administration/gestion-catalogues/categories', CategorieController::class, ['as' => 'administration.gestion-catalogues'])->except('show','edit','create');
    Route::post('administration/gestion-catalogues/categories{id}', [CategorieController::class, 'restore'])->name('administration.gestion-catalogues.categories.restore');
    
    //Gestion-catalogue/Relations
    Route::resource('administration/gestion-catalogues/relations', TypeRelationController::class, ['as' => 'administration.gestion-catalogues'])->except('show','edit','create');
    Route::post('administration/gestion-catalogues/relations{id}', [TypeRelationController::class, 'restore'])->name('administration.gestion-catalogues.relations.restore');

    //Gestion-catalogue/Ressources
    Route::resource('administration/gestion-catalogues/ressources', TypesRessourceController::class, ['as' => 'administration.gestion-catalogues'])->except('show','edit','create');
    Route::post('administration/gestion-catalogues/ressources{id}', [TypesRessourceController::class, 'restore'])->name('administration.gestion-catalogues.ressources.restore');
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
