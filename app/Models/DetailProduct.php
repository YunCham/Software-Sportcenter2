<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'brand_id', 'size_id', 'color_id', 'quantity', 'status', 'price'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function size()
    {
        return $this->hasMany(Size::class);
    }
    
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }
}
