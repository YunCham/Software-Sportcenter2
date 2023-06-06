<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'location',
        'phone',
        'about',
        'tipo_proveedor'
    ];
    public function notasCompra()
    {
        return $this->hasMany(NotaCompra::class);
    }

}
