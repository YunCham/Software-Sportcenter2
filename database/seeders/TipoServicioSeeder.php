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
                'nombre' => 'dfgdfgsda',

            ],
            //nro 3
            [
                'nombre' => 'Servicio x',

            ],
            //nro 4
            [
                'nombre' => 'Acceso',

            ],
            //EXTRAS nro 5
            [
                'nombre' => 'Deportes individuales',

            ],
            //nro 6
            [
                'nombre' => 'Deportes en equipo',

            ],
            //nro 7
            [
                'nombre' => 'Acondicionamiento fisico',

            ],
            //nro 8
            [
                'nombre' => 'Salud y bienestar',

            ],
            //nro 9
            [
                'nombre' => 'Actividades acuaticas',

            ],
            //nro 10
            [
                'nombre' => 'Artes marciales',

            ],
             //nro 11
             [
                'nombre' => 'Ocio y recreacion',

            ],
        ];

        foreach ($tipos as $tipo) {
            TipoServicio::create($tipo);
        }
    }
}
