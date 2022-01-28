<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;

class UtilisateurModel extends Model 
{

    protected $table = 'Utilisateur';
    public $timestamps = true;

    public function Favoris()
    {
        return $this->hasMany('FavorisModel', 'FavorisUtilisateur');
    }

    public function Utilisateur_res()
    {
        return $this->hasMany('RessourcesModel', 'RessUtilisateur');
    }

}