<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Personal extends Model
{
  use HasFactory;
  
   /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/  
    protected $guarded =['id','created_at','updated_at'];
  
  
  
  //relacion de  uno a uno con personal y user
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
