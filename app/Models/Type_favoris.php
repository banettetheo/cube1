<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_favoris extends Model
{
    protected $table='type_favoris';
    protected $primaryKey='id';

    use HasFactory;
    
    public $fillable = [
        'Nom',
    ];
}
