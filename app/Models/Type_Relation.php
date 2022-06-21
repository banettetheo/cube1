<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_Relation extends Model
{
    use SoftDeletes;
    protected $table='type_relation';
    protected $primaryKey='id';

    use HasFactory;
    
    protected $fillable = [
        'Nom',
        'updated_at',
        'deleted_at'
    ];
}
