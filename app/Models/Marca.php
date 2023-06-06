<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
class Marca extends Model
{
    use HasFactory;
    //Asignacion masiva
    protected $fillable = ['nombre'];

     //relacion de uno a muchos
     public function productos(){
        return $this->hasMany(Producto::class);
    }
}
