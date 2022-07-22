<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\RessourceRepository;
use Illuminate\Http\Request;

class GestionRessources extends Controller
{


    private $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
      $this->ressourceRepository = $ressourceRepository;
    }

    
    public function getPrivee(){

    }


    public function getMisesDeCote(){
        $ressources = $this->ressourceRepository->FindByTypeFavoris(Auth()->id(),2);
        return view('front-FO.ressources.mise-de-cote', [
            "ressources"=>$ressources,
        ]);
    }

    public function getFavoris(){
        $ressources = $this->ressourceRepository->FindByTypeFavoris(Auth()->id(),1);
        return view('front-FO.ressources.favoris', [
            "ressources"=>$ressources,
        ]);
    }
}
