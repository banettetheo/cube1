<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table='relation';
    protected $primaryKey='id';

    use HasFactory;

   public function IdRelation() {
       return $this->hasOne('App\Models\Type_Relation', 'IdTypeRelation');
     }
     
     public function User1() {
       return $this->hasone('App\Models\Utilisateur', 'IdUser1');
     }

     public function User2() {
      return $this->hasone('App\Models\Utilisateur', 'IdUser2');
    }
}