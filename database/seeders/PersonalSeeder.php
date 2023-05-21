<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personales = [
            [
                'ci' => '123456789',
                'nombre' => 'Juan',
                'apellidos' => 'Perez',
                'fecha_nacimiento' => '1990-01-01',
                'genero' => 'Masculino',
                'telefono' => '1234567890',
                'distrito' => 'Distrito 1',
                'calle' => 'Calle Principal',
                'n_casa' => 123,
                'cargo' => 'Empleado',
                'salario' => 1500.00,
                'fecha_inicio_contrato' => '2022-01-01',
                'fecha_fin_contrato' => '2023-12-31',
                'estado' => 'Activo',
            ],
            [
                'ci' => '987654321',
                'nombre' => 'Maria',
                'apellidos' => 'Lopez',
                'fecha_nacimiento' => '1995-05-10',
                'genero' => 'Femenino',
                'telefono' => '9876543210',
                'distrito' => 'Distrito 2',
                'calle' => 'Calle Secundaria',
                'n_casa' => 456,
                'cargo' => 'Gerente',
                'salario' => 3000.00,
                'fecha_inicio_contrato' => '2020-06-01',
                'fecha_fin_contrato' => '2025-05-31',
                'estado' => 'Activo',
            ],
            [
                'ci' => '543216789',
                'nombre' => 'Carlos',
                'apellidos' => 'Gomez',
                'fecha_nacimiento' => '1985-12-15',
                'genero' => 'Masculino',
                'telefono' => '5555555555',
                'distrito' => 'Distrito 3',
                'calle' => 'Calle Principal',
                'n_casa' => 789,
                'cargo' => 'Supervisor',
                'salario' => 2000.00,
                'fecha_inicio_contrato' => '2019-03-01',
                'fecha_fin_contrato' => '2024-02-29',
                'estado' => 'Activo',

            ],
        ];
        foreach ($personales as $personal) {
            Personal::create($personal);
        }
    }
}
