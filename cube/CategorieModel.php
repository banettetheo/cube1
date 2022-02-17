<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorieModel extends Model 
{

    protected $table = 'Categorie';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}