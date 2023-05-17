<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Personal extends Model
{
  use HasFactory;
  
  //relacion de  uno a uno con personla y user
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
