<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function detailProducts()
    {
        return $this->belongsToMany(DetailProduct::class, 'color_product');
    }
    
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
}
