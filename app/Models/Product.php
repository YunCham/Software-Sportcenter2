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

    protected $fillable = ['name', 'slug', 'price', 'quantity', 'subcategory_id'];

    public function detailProducts()
    {
        return $this->hasMany(DetailProduct::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
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
