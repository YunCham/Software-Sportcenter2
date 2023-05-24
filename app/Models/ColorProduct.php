<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;
    protected $table = "color_product";

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
