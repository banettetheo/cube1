<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressources extends Model
{
    protected $table='ressources';
    protected $primaryKey='id';

    use HasFactory;

    public function Categorie() {
        return $this->belongsTo('App\Models\Categorie', 'IdCategorie');
      }

      public function Utilisateur() {
        return $this->belongsTo('App\Models\Utilisateur', 'IdUtilisateur_createur');
      }

      public function Type() {
        return $this->belongsTo('App\Models\Type_ressource', 'IdType');
      }

      public function Etat() {
        return $this->belongsTo('App\Models\Etat', 'IdEtat');
      }
    
    public $fillable = [
        'Lien_ressources',
        'Type',
        'Nombre_vue',
        'Nombre_like',
    ];
}
