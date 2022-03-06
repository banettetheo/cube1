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
            'commentaires' => Commentaire::all()
                ->where('idRessources', $ressource->id)
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
