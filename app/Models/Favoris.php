<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    protected $table='favoris';
    protected $primaryKey='id';
    protected $fillable= [
      'Utilisateur_id',
      'IdRessources',
      'Types_favoris_id'
    ];
    
    use HasFactory;

    public function Utilisateur() {
       return $this->hasOne('App\Models\Utilisateur', 'Utilisateur_id');
     }
     
     public function Ressources() {
       return $this->hasMany('App\Models\Ressources', 'IdRessource');
     }
}
