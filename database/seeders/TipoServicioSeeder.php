<?php

namespace Database\Seeders;

use App\Models\TipoServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            //nro 1
            [
                'nombre' => 'Clases',
               
            ],
            //nro 2
            [
            'nombre' => 'Alquiler',
            
            ],
            //nro 3
            [
                'nombre' => 'Servicio',
                
            ],
            //nro 4
            [
                'nombre' => 'Acceso',
    
            ],
           
        ];
    
        foreach ($tipos as $tipo) {
            TipoServicio::create($tipo);
        }
    }
}
