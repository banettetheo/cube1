<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PHPUnit\Framework\Constraint\Count;

class Rechercher extends Component
{
    public $current_init = false;
    public $ressources = array();
    public $ressources_temp = array();
    public $ressources_trop_plein = array();
    public $categories;
    public $typesRessources;
    public $current_ressources = [];
    public $nb_article;
    public $current_categ = "";
    public $current_type = "";

    protected $listeners = [
        'addArticles',
        'filtreCateg',
        'filtreType'
    ];


    private function searchArticles($ressources_temp, $filtres)
    {
        $i = 0;
        $this->ressources_trop_plein = [];
        foreach ($ressources_temp as $id_ressource => $ressource) {

            $garder = false;
            if (Count($filtres) >= 1) {
                foreach ($filtres as $key => $option) {
                    if ($ressource[$key]['Nom'] == $option) {
                        $garder = true;
                    } else {
                        $garder = false;
                        break;
                    }
                }
            } else {
                $garder = true;
            }
            if ($garder) {
                if ($i < 10) {
                    array_push($this->current_ressources, $ressource);
                    array_splice($ressources_temp, $id_ressource, 1);
                    $i++;
                }else{
                   array_push($this->ressources_trop_plein, $ressource); 
                }
            }
        }
    }

    public function filtreCateg($id)
    {
        $this->current_ressources = [];
        if ($id != 0) {
            foreach ($this->categories as $categorie) {
                if ($categorie['id'] == $id) {
                    $this->current_categ = $categorie['nom'];
                    break;
                }
            }
        } else {
            $this->current_categ = "";
        }
        $this->filtre();
    }


    public function filtreType($id)
    {
        $this->current_ressources = [];
        if ($id != 0) {
            foreach ($this->typesRessources as $type) {
                if ($type['id'] == $id) {
                    $this->current_type = $type['nom'];
                    break;
                }
            }
        } else {
            $this->current_type = "";
        }
        $this->filtre();
    }

    private function filtre()
    {
        $ressources_temp = $this->ressources;
        $filtres = [];
        if ($this->current_categ != "") {
            $filtres["categorie"] = $this->current_categ;
        }
        if ($this->current_type != "") {
            $filtres["type"] = $this->current_type;
        }
        $this->searchArticles($ressources_temp, $filtres);
    }


    public function addArticles()
    {
        $i = 0;
        foreach ($this->ressources_trop_plein as $ressource) {
            if ($i < 10) {
                array_push($this->current_ressources, $ressource);
                array_splice($this->ressources_trop_plein, 0, 1);
            } else {
                break;
            }
            $i++;
        }
    }

    private function restaurerRessources()
    {
        $this->ressources_temp = $this->ressources;
    }

    public function render()
    {
        if(!$this->current_init){
            $this->filtre();
            $this->current_init = true;
        }

        return view('livewire.rechercher');
    }
}
