<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    use HasFactory;

    // Metodo  para decir  solo estos atributos sean manipulados
    protected $fillable = [
        'nombre',
        'precio',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'descripcion'
    ];


    //! relacionde muchos a muchos entre  membresia y servcio
    public function servicio()
    {
        return $this->belongsToMany('App\Models\Servicio');
    }
}
