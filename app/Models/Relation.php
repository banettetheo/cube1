<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table='relation';
    protected $primaryKey='id';

    use HasFactory;

    protected $fillable = [
      'IdTypeRelation',
      'IdUser1',
      'IdUser2',
      'deleted_at'
    ];

   public function IdRelation() {
       return $this->belongsTo('App\Models\Type_Relation', 'IdTypeRelation');
     }
     
     public function User1() {
       return $this->belongsTo('App\Models\User', 'IdUser1');
     }

     public function User2() {
      return $this->belongsTo('App\Models\User', 'IdUser2');
    }
}
