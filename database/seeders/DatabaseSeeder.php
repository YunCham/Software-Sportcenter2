<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret')
        ]);



        $usuarios = [
            //nro 1
            [
                'name' => 'Eduardo Rojas Calderon',
                'email' => 'calderoneduardo123sc@gmail.com',
                'password' => bcrypt('87654321')
            ],
            //nro 2
            [
                'name' => 'Jhoel Ibarra',
                'email' => 'jhoel123@gmail.com',
                'password' => bcrypt('password123')
            ],
            //nro 3
            [
                'name' => 'Jhonn Montoya',
                'email' => 'montoya@gmail.com',
                'password' => bcrypt('password123')
            ],
            //nro 4
            [
                'name' => 'Carlos Ibañez',
                'email' => 'carlos123@gmail.com',
                'password' => bcrypt('password123')
            ],
            //nro 5
            [
                'name' => 'Marty Medrano',
                'email' => 'marty123@gmail.com',
                'password' => bcrypt('password123')
            ],
            //nro 6
            [
                'name' => 'Alvaro Machuca',
                'email' => 'alvaro123@gmail.com',
                'password' => bcrypt('password123')
            ],
           //nro 7
            [
                'name' => 'Juan Pablo Rodriguez',
                'email' => 'pablojuan123sc@hotmail.com',
                'password' => bcrypt('password123')
            ],
           
        ];
    
        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
        $this->call(PersonalSeeder::class);
        $this->call(MembresiaSeeder::class);
        $this->call(TipoServicioSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(ProveedorSeeder::class);

       
        
    }
}
