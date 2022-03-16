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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource("ressources", RessourceController::class, [
    'as' => 'api'
])->only(['index']);

Route::middleware('auth:sanctum')->group(function () {

    //Gestion de l'API


    Route::apiResource("categories", CategorieController::class, [
        'as' => 'api'
    ])->only(['index']);

    Route::apiResource("types-ressource", TypeRessourceController::class, [
        'as' => 'api'
    ])->only(['index']);

    //Deconnexion
    Route::post('/logout', [AuthController::class, 'logout']);
});
