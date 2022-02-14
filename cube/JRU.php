<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JRU extends Model 
{

    protected $table = 'Jointure_Ress_Utilisateur';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}