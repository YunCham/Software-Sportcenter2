<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;
class TipoServicio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];


  //relacion de uno a muchos
  public function servicios(){
    return $this->hasMany(Servicio::class);
  }
}
