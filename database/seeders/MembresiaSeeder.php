<?php

namespace Database\Seeders;

use App\Models\Membresia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membresias = [
            //nro 1
            [
                'nombre' => 'Membresia individual',
                'descripcion' => 'fasjfklasdjfklasjdklfjasl',
                'estado' => 'Activo',
                'precio' => 20,
                /*  'fecha_inicio' => '2023-02-15',
                'fecha_vencimiento' => '2023-11-30',*/
            ],
            //nro 2
            [
                'nombre' => 'Membresia familiar',
                'descripcion' => 'Descripción del producto 2',
                'estado' => 'Desactivo',
                'precio' => 20,
                /* 'fecha_inicio' => '2023-02-15',
            'fecha_vencimiento' => '2023-11-30',*/
            ],
            //nro 3
            [
                'nombre' => 'Membresia corporativa',
                'descripcion' => 'Descripción del producto 2',
                'estado' => 'Desactivo',
                'precio' => 20,
                /*'fecha_inicio' => '2023-02-15',
                'fecha_vencimiento' => '2023-11-30',*/
            ],
            //nro 4
            [
                'nombre' => 'Membresia estudiantil',
                'descripcion' => 'Descripción del producto 2',
                'estado' => 'Activo',
                'precio' => 20,
                /* 'fecha_inicio' => '2023-02-15',
            'fecha_vencimiento' => '2023-11-30',*/
            ],
            //nro 5
            [
                'nombre' => 'Membresia senior',
                'descripcion' => 'Descripción del producto 2',
                'estado' => 'Activo',
                'precio' => 20,
                /*'fecha_inicio' => '2023-02-15',
            'fecha_vencimiento' => '2023-11-30',*/
            ],

        ];

        foreach ($membresias as $membresia) {
            Membresia::create($membresia);
        }
    }
}
