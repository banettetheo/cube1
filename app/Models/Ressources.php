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
    
    public $fillable = [
        'Lien_ressources',
        'Type',
    ];
}
