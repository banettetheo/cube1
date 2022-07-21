<?php

namespace App\Http\Livewire;

use App\Models\Commentaire;
use App\Models\Favoris;
use App\Models\Ressources;
use Livewire\Component;

class RessourcesPersonnelles extends Component
{
    protected $listeners = [
        'cotes',
    ];
    public $init = false;
    public $ressources;
    public $ressources_final;
    public $nbVue;
    public $nbLike;
    public $titre;
    public $monCompte=true;


    public function cotes()
    {
        $this->titre = "Vos ressources privées";
        $cotes = Favoris::where([[Auth()->id()=>"Utilisateur_id"],[2=>'Type_favoris_id']])->get()->Ressources->map(
            function ($ressource) {
                return $this->getOne($ressource);
            }
        )->toArray();
        dd($cotes);
    }

    private function getOne($ressource)
    {
        return [
            'id' => $ressource->id,
            'titre' => $ressource->Titre,
            'contenu' => $ressource->Contenue,
            'categorie' => $ressource->Categorie->only('Nom'),
            'utilisateur' => $ressource->Utilisateur->only('name', 'Prenom'),
            'type' => $ressource->Type->only('Nom'),
            'etat' => $ressource->Etat->only('id', 'Nom'),
            'lienRessource' => $ressource->Lien_ressources,
            'commentaires' => Commentaire::where('IdRessources', $ressource->id)
                ->get()
                ->map(function ($commentaire) {
                    return [
                        'id' => $commentaire->id,
                        //'dateCreation' => $Commentaire->id,
                        'utilisateur' => $commentaire->Utilisateur->only('id', 'name', 'Prenom'),
                        'contenu' => $commentaire->Contenue
                    ];
                }),
            'nbLike' => $ressource->Nombre_like,
            'nbVue' => $ressource->Nombre_vue
        ];
    }

    public function render()
    {
        if(!$this->init){

            $this->titre = ("Vos actualités et celles qui sont partagées avec vous");
            $this->ressources_final = $this->ressources;
            $this->init = true;
        }
        return view('livewire.ressources-personnelles');
    }
}
