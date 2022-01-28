<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeModel extends Model 
{

    protected $table = 'Type';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}