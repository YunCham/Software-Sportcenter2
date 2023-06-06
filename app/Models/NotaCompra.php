<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    //Asignacion masiva para todos los campos excepto los de guarded
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion de uno a muchos inversa
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    //Relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Relacion de muchos a muchos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'nota_compra_producto')->withPivot('cantidad');
    }
}
