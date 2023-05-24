<?php

namespace App\Models;

use App\Http\Livewire\Compra\ColorSize;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //accesores

    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return $this->sizes->sum(function ($size) {
                return $size->pivot->quantity ?? 0;
            });
        } elseif ($this->subcategory->color) {
            return $this->colors->sum(function ($color) {
                return $color->pivot->quantity ?? 0;
            });
        } else {
            return $this->quantity;
        }
    }

    public function detailProducts()
    {
        return $this->hasMany(DetailProduct::class, 'product_id');
    }

    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }

    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }

    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
