<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areacomun extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relacion d emuchos a muchos
    public function inventarios()
    {
        return $this->belongsToMany(inventario::class);
    }

}
