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



    public function findById(int $id){
        $laRessource = Ressources::findOrFail($id);
        $ressource = $this->one($laRessource);
        return $ressource;
    }


    private function one($ressource)
    {
        return [
            'id' => $ressource->id,
            'titre' => $ressource->Titre,
            'contenu' => $ressource->Contenue,
            'categorie' => $ressource->Categorie->only('Nom'),
            'utilisateur' => $ressource->Utilisateur->only('Nom', 'Prenom'),
            'type' => $ressource->Type->only('Nom'),
            'etat' => $ressource->Etat->only('Nom'),
            'lienRessource' => $ressource->Lien_ressources,
            'commentaires' => Commentaire::where('idRessources', $ressource->id)
                ->get()
                ->map(function ($commentaire) {
                    return [
                        //'dateCreation' => $Commentaire->id,
                        'utilisateur' => $commentaire->Utilisateur->only('Nom', 'Prenom'),
                        'contenu' => $commentaire->Contenue
                    ];
                }),
            //'like' => $ressource->Like
        ];
    }
}
