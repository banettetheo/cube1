<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Rechercher extends Component
{
    private $array_init = false;
    public $ressources = array();
    public $current_ressources = [];
    public $nb_article;

    protected $listeners = ['addArticles'];

    private function init(){
        $i=0;
        foreach($this->ressources as $ressource){
            if($i<10){
                array_push($this->current_ressources, $ressource);
                array_splice($this->ressources, 0, 1);
            }else{
                break;
            }
            $i++;
        }
    }


    public function addArticles(){
        $this->init();
        // dd($this->current_ressources);
    }


    public function render()
    {
        if(!$this->array_init){
            $this->init();
            $this->array_init = true;
        }
        // $this->init();
        // $this->init();
        return view('livewire.rechercher');
    }
}
