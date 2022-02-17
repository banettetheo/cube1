<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
    public function connexion(){
        return view('connexion');
    }

    public function inscription(){
        return view('inscription');
    }

    public function deconnexion(){
        return view ('accueil');
    }
}
