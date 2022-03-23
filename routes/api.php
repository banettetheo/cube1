<?php

use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RelationController;
use App\Http\Controllers\API\RessourceController;
use App\Http\Controllers\API\TypeRessourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('register', [AuthController::class, 'register'],['as' => 'api']);
Route::post('login', [AuthController::class, 'login'],['as' => 'api']);

Route::apiResource("ressources", RessourceController::class, ['as' => 'api'])->only(['index','show']);
Route::apiResource("types-ressources", TypeRessourceController::class, ['as' => 'api'])->only(['index']);
Route::apiResource("categories", CategorieController::class, ['as' => 'api'])->only(['index']);
Route::get("utilisateurs/{id}", [RelationController::class, 'show'], ['as' => 'api']);



//MIDDLEWARE CONNEXION
Route::middleware('auth:sanctum')->group(function () {
    //Ressources
    Route::get("ressources/{id}/modifier", [RessourceController::class, 'edit'], ['as' => 'api']);
    Route::get("mon-compte/ressources", [RessourceController::class, 'indexUtilisateur'], ['as' => 'api']);
    Route::get("mon-compte/ressources/privees", [RessourceController::class, 'indexPrive'], ['as' => 'api']);
    Route::get("mon-compte/ressources/tableau-de-bord", [RessourceController::class, 'indexTableauBord'], ['as' => 'api']);
    Route::apiResource("ressources", RessourceController::class, ['as' => 'api'])->except(['index','show']);
    Route::post("utilisateurs/{id}", [RelationController::class, 'store'], ['as' => 'api']);
    Route::apiResource("relations", RelationController::class, ['as' => 'api'])->except(['show','store']);
    Route::post('logout', [AuthController::class, 'logout'],['as' => 'api']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
