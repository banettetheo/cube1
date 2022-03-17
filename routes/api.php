<?php

use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\AuthController;
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

Route::apiResource("ressources", RessourceController::class, ['as' => 'api'])->only(['index']);


//MIDDLEWARE CONNEXION
Route::middleware('auth:sanctum')->group(function () {
    //Ressources
    Route::get("ressources/mes-ressources", [RessourceController::class, 'indexUtilisateur'], ['as' => 'api']);
    Route::apiResource("ressources", RessourceController::class, ['as' => 'api'])->except(['index']);
    Route::apiResource("categories", CategorieController::class, ['as' => 'api'])->only(['index']);
    Route::apiResource("types-ressource", TypeRessourceController::class, ['as' => 'api'])->only(['index']);
    Route::post('logout', [AuthController::class, 'logout'],['as' => 'api']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
