<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    //Relacion muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function detailProducts()
    {
        return $this->hasMany(DetailProduct::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
