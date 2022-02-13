<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RessourcesController extends Controller
{

    public function consulterLesRessources(){
        return view ('consulter');
    }

    public function consulterUneRessource($id){
        return view ('consulter');
    }

    public function creer(){
        return view ('ressources/creer');
    }

    public function modifier($id){
        return view('ressources/modifier');
    }

    public function supprimer($id){
        return view ('ressources/supprimer');
    }
}
