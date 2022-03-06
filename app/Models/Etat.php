<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $table='etat';
    protected $primaryKey='id';

    use HasFactory;
    
    protected $fillable = [
        'Nom',
        'deleted_at'
    ];
}
