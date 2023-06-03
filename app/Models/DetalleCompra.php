<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'quantity',
        'compra_id',
        'detail_product_id',
    ];

    public function nota_compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function detailproducto()
    {
        return $this->belongsTo(DetailProduct::class);
    }
}
