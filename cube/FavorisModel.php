<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavorisModel extends Model 
{

    protected $table = 'Favoris';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}