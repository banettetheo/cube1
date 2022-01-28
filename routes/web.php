<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('utilisateurmodel', 'UtilisateurModelController');
Route::resource('favorismodel', 'FavorisModelController');
Route::resource('relationmodel', 'RelationModelController');
Route::resource('type_relationmodel', 'Type_relationModelController');
Route::resource('commentairemodel', 'CommentaireModelController');
Route::resource('ressourcesmodel', 'RessourcesModelController');
Route::resource('typemodel', 'TypeModelController');
Route::resource('categoriemodel', 'CategorieModelController');
