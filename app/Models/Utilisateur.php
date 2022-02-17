<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table='utilisateurs';
    protected $primaryKey='id';

    use HasFactory;
    
    public $fillable = [
        'Prenom',
        'Nom',
        'Moderateur',
    ];
}
