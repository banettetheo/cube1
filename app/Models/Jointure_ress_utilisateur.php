<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jointure_ress_utilisateur extends Model
{
    protected $table='jointure_ress_utilisateur';
    protected $primaryKey='id';

    use HasFactory;

    public function Utilisateur() {
       return $this->hasMany('App\Post', 'IdUtilisateur');
     }
     
     public function Ressources() {
       return $this->hasMany('App\Comment', 'IdRessource');
     }
}
