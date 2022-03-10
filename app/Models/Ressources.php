<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressources extends Model
{
    protected $table='ressources';
    protected $primaryKey='id';
    protected $fillable = [
        'Titre',
        'Contenue',
        'created_at',
        'updated_at',
        'IdCategorie',
        'IdUtilisateur_createur',
        'IdType',
        'IdEtat',
        'Lien_ressources',
        'Nombre_vue',
        'Nombre_like'
    ];

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
}
