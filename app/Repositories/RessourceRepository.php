<?php


namespace App\Repositories;

use App\Models\Commentaire;
use App\Models\Ressources;

class RessourceRepository
{
    public function all()
    {
        $lesRessources = Collect(Ressources::all()
            ->sortByDesc('created_at')
            ->take(100))
            ->map(function ($ressource) {
                return $this->one($ressource);
            });

        return $lesRessources;
    }


    public function allPublic(){
        $touteLesRessources = $this->all();
        $ressourcesTries = [];
        foreach ($touteLesRessources as $uneRessource){
            if($uneRessource['etat']['id']==4){
                array_push($ressourcesTries, $uneRessource);
            }
        }
        return $ressourcesTries;
        
    }



    public function findById(int $id){
        $laRessource = Ressources::findOrFail($id);
        $ressource = $this->one($laRessource);
        return $ressource;
    }


    public function one($ressource)
    {
        return [
            'id' => $ressource->id,
            'titre' => $ressource->Titre,
            'contenu' => $ressource->Contenue,
            'categorie' => $ressource->Categorie->only('Nom'),
            'utilisateur' => $ressource->Utilisateur->only('Nom', 'Prenom'),
            'type' => $ressource->Type->only('Nom'),
            'etat' => $ressource->Etat->only('id','Nom'),
            'lienRessource' => $ressource->Lien_ressources,
            'commentaires' => Commentaire::where('IdRessources', $ressource->id)
                ->get()
                ->map(function ($commentaire) {
                    return [
                        'id' => $commentaire->id,
                        //'dateCreation' => $Commentaire->id,
                        'utilisateur' => $commentaire->Utilisateur->only('Nom', 'Prenom'),
                        'contenu' => $commentaire->Contenue
                    ];
                }),
            'nbLike' => $ressource->Nombre_like,
            'nbVue' => $ressource->Nombre_vue
        ];
    }
}
