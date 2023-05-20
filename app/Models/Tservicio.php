<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;
class Tservicio extends Model
{
    use HasFactory;

        //realcion de uno a muchos...entre  tipo de servio y  servicio
        public function servicio()
        {
            return $this->hasMany(Servicio::class, 'servicio_id');
        }
}
