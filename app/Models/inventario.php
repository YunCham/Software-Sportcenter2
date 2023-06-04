<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relacion de mucho a mucho 
    public function deportes(){
        return $this->belongsToMany(deporte::class);
    }
     // relacion de mucho a mucho 
     public function areascomuns(){
        return $this->belongsToMany(areacomun::class);
    }
}
