<?php

namespace Cube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentaireModel extends Model 
{

    protected $table = 'Commentaire';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}