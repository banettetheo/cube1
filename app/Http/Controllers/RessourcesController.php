<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RessourcesController extends Controller
{

    // public function consulterLesRessources(){
    //     return view ('consulter');
    // }

     public function consulterUneRessource($id){
         return view ('ressources/zoomRessource');
     }

    public function creer(){
        return view ('ressources/createRessource');
    }

    public function modifier($id){
        return view('ressources/modifRessource');
    }

    public function supprimer($id){
        return view ('user/compteUser');
    }
}
