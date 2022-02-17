<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_relationModel extends Model 
{

    protected $table = 'Type_relation';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}