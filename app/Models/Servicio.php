<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoServicio;
use App\Models\Membresia;
class Servicio extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    //relacion de uno a muchos inversa
    public function tipo_servicio(){
        return $this->belongsTo(TipoServicio::class, 'tipo_servicio_id');
    }
    //relacion de muchos a muchos 
    public function membresias(){
        return $this->belongsToMany(Membresia::class);
    }
}
