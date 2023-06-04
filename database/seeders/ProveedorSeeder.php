<?php

namespace Database\Seeders;

use App\Models\proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedor = [
            'name' => 'jhoel',
            'email'=> 'dasdad@gmail.com',
            'location' => 'dadasda',
            'phone' => 3232,
            'about' => 'sadadadasdadadada',
            'tipo_proveedor' => 'polera'
        ];
        
        proveedor::create($proveedor);
        
    }
}
