<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'Nike'],
            ['nombre' => 'Puma'],
            ['nombre' => 'jordan'],
            ['nombre' => 'Reebook'],
            ['nombre' => 'Adidas'],
            ['nombre' => 'Gucci'],
            ['nombre' => 'Polo'],
        ];
        foreach($marcas as $marca){
            Marca::create($marca);
        }
    }
}
