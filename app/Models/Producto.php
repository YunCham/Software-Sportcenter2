<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    //Asignacion masiva para todos los campos excepto los de guarded
    protected $guarded =['id','created_at','updated_at'];


    //Relacion uno a muchos inversa
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
    
    //Relacion uno a muchos inversa
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Relacion de muchos a muchos
    public function notasCompra()
    {
        return $this->belongsToMany(NotaCompra::class, 'nota_compra_producto')->withPivot('cantidad');
    }
}
