<?php

namespace Database\Seeders;

use App\Models\Servicio;
use App\Models\TipoServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoServicios = TipoServicio::pluck('id');
        $servicios = [
            //nro 1
            [
                'nombre' => 'Clases de yoga',
                'descripcion' => 'clases grupales de yoga',
                'estado' => 'Activo',
                
                'tipo_id' => $tipoServicios->random(),
               
            ],
            //nro 2
            [
                'nombre' => 'Alquiler de canchas',
                'descripcion' => 'fjsdakfjasdlkfjklasdjfkasfjl',
                'estado' => 'Activo',
                
                'tipo_id' => 3,
            
            ],
            //nro 3
            [
                'nombre' => 'Entrenamiento personal',
                'descripcion' => 'fjasdkfljsdlkfjskldfjklsajf',
                'estado' => 'Activo',
                
                'tipo_id' => 4,
                
            ],
            //nro 4
            [
                'nombre' => 'Clases de natacion',
                'descripcion' => 'fjsdklfjsdklfjsdlñkfjasf',
                'estado' => 'Activo',
                
                'tipo_id' => $tipoServicios->random(),
    
            ],
           //nro 5
           [
            'nombre' => 'Acceso al gimnasio',
            'descripcion' => 'asfskfksadlfkasdñflñsdk',
            'estado' => 'Activo',
           
            'tipo_id' => 2,

        ],
           
        ];
    
        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }

    }
}
