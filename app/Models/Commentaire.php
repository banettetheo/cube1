<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table='commentaire';
    protected $primaryKey='id';

    use HasFactory;

    public $fillable = [
        'Contenue',
    ];

    public function Utilisateur() {
       return $this->hasOne('App\Models\Utilisateur', 'IdUser');
     }
     
     public function Ressources() {
       return $this->hasMany('App\Models\Ressources', 'IdRessources');
     }
}
