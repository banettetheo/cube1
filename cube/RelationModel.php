<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelationModel extends Model 
{

    protected $table = 'Relation';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}