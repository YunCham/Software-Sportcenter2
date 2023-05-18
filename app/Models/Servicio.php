<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tservicio;

class Servicio extends Model
{
  use HasFactory;

  // metodo para proteger atributos
  //   protected $guarded = ['id', 'created_at', 'updated_at'];


  // Metodo  para decir  solo estos atributos sean manipulados
  protected $fillable = [
    'tservicio_id',
    'nombre',
    'descripcion',
    'duracion',
    'precio',
    'estado'
  ];


  //realcion de uno a muchos...entre  tipo de servio y  servicio
  public function tiposervicio()
  {

    //return $this->belongsTo(TipoServicio::class,'tipo_servicio_id');
    return $this->belongsTo(Tservicio::class, 'tservicio_id');
  }


      //! relacionde muchos a muchos entre  membresia y servcio
      public function membresia()
      {
          return $this->belongsToMany('App\Models\Membresia');
      }
}
