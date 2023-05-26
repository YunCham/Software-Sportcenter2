<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id'];

    // Relación muchos a muchos con la tabla 'colors'
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    public function detailProducts()
    {
        return $this->belongsToMany(DetailProduct::class, 'color_size');
    }
}
