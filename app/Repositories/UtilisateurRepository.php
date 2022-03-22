<?php

namespace App\Repositories;

use App\Models\Utilisateur;

class UtilisateurRepository
{

    public function findById($id)
    {
        $unUtilisateur = Utilisateur::findOrFail($id);
        $utilisateur = $this->one($unUtilisateur);
        return $utilisateur;
    }

    public function one($unUtilisateur)
    {
        return [
            'id' => $unUtilisateur->id,
            'nom' => $unUtilisateur->Nom,
            'prenom' => $unUtilisateur->Prenom,
            'email' => $unUtilisateur->Email,
            'moderateur' => $unUtilisateur->Moderateur
        ];
    }
}
