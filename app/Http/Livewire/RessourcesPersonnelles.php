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



      public function render()
    {
        return view('livewire.ressources-personnelles');
    }
}
