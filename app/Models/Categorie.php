<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;
    protected $table='categorie';
    protected $primaryKey='id';
    use HasFactory;
    
    protected $fillable = [
        'Nom',
        'updated_at',
        'deleted_at'
    ];

    public function  getDateUpdateAttribute($value){
        $dateUpdate = new DateTime($value);
        return $dateUpdate->format('Y-m-d');
    }

    // protected $dispatchesEvents=[
    //     'saved' => UserSaved::class,
    //     'deleted' => UserDeleted::class,
    // ];
}
