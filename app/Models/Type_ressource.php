<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_ressource extends Model
{
    protected $table='type_ressource';
    protected $primaryKey='id';

    use HasFactory;
    
    protected $fillable = [
        'Nom',
        'deleted_at'
    ];
}
