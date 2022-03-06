<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Relation extends Model
{
    protected $table='type_relation';
    protected $primaryKey='id';

    use HasFactory;
    
    protected $fillable = [
        'Nom',
    ];
}
