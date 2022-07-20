<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RechercheUtilisateur extends Component
{
    public $current_init = false;
    public $utilisateurs;
    public $utilisateurs_tries;


    protected $listeners = [
        'filtrer',
    ];

    public function filtrer($value){
        $this->utilisateurs_tries = [];

        foreach($this->utilisateurs as $utilisateur){
            if(str_contains(strtolower($utilisateur['name']),strtolower($value)) || str_contains(strtolower($utilisateur['Prenom']),strtolower($value))){
                array_push($this->utilisateurs_tries,$utilisateur);
            }
        }
    }

    public function render()
    {
        if(!$this->current_init){
            $this->utilisateurs_tries = $this->utilisateurs;
            $this->current_init=true;
        }
        return view('livewire.recherche-utilisateur');
    }
}
