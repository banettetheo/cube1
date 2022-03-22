<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table='commentaire';
    protected $primaryKey='id';

    use HasFactory;

    protected $fillable = [
        'Contenue',
        'IdUser',
        'IdRessources'
    ];

    public function Utilisateur() {
       return $this->belongsTo('App\Models\User', 'IdUser');
     }
     
     public function Ressources() {
       return $this->hasMany('App\Models\Ressources', 'IdRessources');
     }
}
