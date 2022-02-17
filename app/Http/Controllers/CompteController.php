<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function consulterLesUtilisateurs(){
        return view('compte/utilisateurs');
    }

    public function consulterLesCitoyens(){
        return view('compte/utilisateurs');
    }


    public function creerAdministrateur(){
        return view('');
    }

    public function creerCitoyen(){
        return view('');
    }

    public function creerModerateur(){
        return view('');
    }


    public function reactiver(){
        return view('');
    }

    public function desactiverCitoyen(){
        return view('');
    }

    public function ajouterGrade(){
        return view('');
    }

    public function retirerGrade(){
        return view('');
    }
}
