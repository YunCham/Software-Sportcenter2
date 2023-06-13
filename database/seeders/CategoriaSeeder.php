<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'polera'],
            ['nombre' => 'racate'],
            ['nombre' => 'balon de futbol'],
            ['nombre' => 'balon de futsal'],
            ['nombre' => 'polera'],
            ['nombre' => 'tenis'],
            ['nombre' => 'polera de basquet'],
        ];
        foreach($categorias as $categoria){
            Categoria::create($categoria);
        }
    }
}
