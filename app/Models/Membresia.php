<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaccion;
use App\Models\Servicio;
class Membresia extends Model
{
    use HasFactory;
    
    /*cuando tiene muchos campos(atributos)
    los sgts no se asignan masivamente*/  
    protected $guarded =['id','created_at','updated_at'];



    //relacion de uno a muchos
    public function transaccions(){
        return $this->hasMany(Transaccion::class);
    }
    //relacion de muchos a muchos
    public function servicios(){
        return $this->belongsToMany(Servicio::class);
    }
}
