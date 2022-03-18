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
        $ressourcesTries = Ressources::where('IdEtat',4)
        ->get()
        ->map(function ($ressource) {
            return $this->one($ressource);
        });

        return $ressourcesTries;
        
    }



    public function AllPublicByType(int $id){
        $ressourcesTriees = array();
        $toutesLesRessources = $this->allPublic();
        foreach($toutesLesRessources as $uneRessource){
            if($this->returnType($uneRessource)==$id){
                array_push($ressourcesTriees,$uneRessource);
            }
        }
        return $ressourcesTriees;
    }



    public function AllPublicByCategorie(int $id){
        $ressourcesTriees = array();
        $toutesLesRessources = $this->allPublic();
        foreach($toutesLesRessources as $uneRessource){
            if($this->returnCategorie($uneRessource)==$id){
                array_push($ressourcesTriees,$uneRessource);
            }
        }
        return $ressourcesTriees;
    }



    public function AllPublicByTypeAndCateg($idType, $idCateg){
        $ressourcesTriees = array();
        $ressourceType = $this->AllPublicByType($idType);
        foreach($ressourceType as $uneRessource){
            if($this->returnCategorie($uneRessource)==$idCateg){
                array_push($ressourcesTriees,$uneRessource);
            }
        }
        return $ressourcesTriees;
    }




    public function allPartages($userId){
        $lesRessources = Ressources::where([
            ['IdEtat',1],
            ['IdUtilisateur_createur',$userId]
        ])
        ->get()
        ->map(function ($ressource) {
            $uneRessource= $this->one($ressource);
            $info = ['typeDeRessource' => 'privee'];
            $result = array_merge($info, $uneRessource);
            return $result;
        });
        return $lesRessources;
        
    }



    public function findByICategorie(int $id){
        $lesRessources = Ressources::where('IdCategorie', $id)
            ->get()
            ->map(function ($ressource) {
                return $this->one($ressource);
            });
        return $lesRessources;
    }



    private function returnType($ressource){
        $uneRessource = Ressources::findOrFail($ressource['id']);
        $typeRessource = $uneRessource->Type->only('id');
        return $typeRessource['id'];
    }




    private function returnCategorie($ressource){
        $uneRessource = Ressources::findOrFail($ressource['id']);
        $categorieRessource = $uneRessource->Categorie->only('id');
        return $categorieRessource['id'];
    }


    public function findByIdType(int $id){
        $lesRessources = Ressources::where('IdType', $id)
            ->get()
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
