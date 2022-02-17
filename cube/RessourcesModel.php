<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RessourcesModel extends Model 
{

    protected $table = 'Ressources';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}