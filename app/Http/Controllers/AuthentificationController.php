<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
    public function connexion(){
        return view('user/connexionUser');
    }

    public function inscription(){
        return view('user/inscriptionUser');
    }

    public function deconnexion(){
        return view ('/');
    }
    
}
