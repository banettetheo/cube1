<?php


namespace App\Repositories\Favoris;

use App\Models\Favoris;
use App\Repositories\RessourceRepository;

class FavorisRepository
{
    private $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
        $this->ressourceRepository = $ressourceRepository;
    }


    public function all()
    {
        $lesFavoris = Collect(Favoris::all());
        return $lesFavoris;
    }

    public function whereFavoris($idUtilisateur)
    {
        $lesFavoris = Favoris::where([
            ['Utilisateur_id', $idUtilisateur],
            ['Type_favoris_id', 1]
        ])
            ->get()
            ->map(function ($unFavoris) {
                $uneRessource= $this->ressourceRepository->findById($unFavoris->IdRessources);
                $info = ['typeDeRessource' => 'favoris'];
                $result = array_merge($info, $uneRessource);
                return $result;
            });
        return $lesFavoris;
    }

    public function whereMiseDeCote($idUtilisateur)
    {
        $lesFavoris = Favoris::where([
            ['Utilisateur_id', $idUtilisateur],
            ['Type_favoris_id', 2]
        ])
            ->get()
            ->map(function ($unFavoris) {
                $uneRessource= $this->ressourceRepository->findById($unFavoris->IdRessources);
                $info = ['typeDeRessource' => 'MiseDeCote'];
                $result = array_merge($info, $uneRessource);
                return $result;
            });
        return $lesFavoris;
    }
}
