<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
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

}
