<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = ['Talla S', 'Talla M', 'Talla L', 'Talla XL', 'Talla XS', 'Talla 37', 'Talla 38', 'Talla 39', 'Talla 40', '30 x 50 cm'];

        foreach ($sizes as $size) {
            Size::create([
                'name' => $size,
                'slug' => Str::slug($size),
            ]);
        }
    }
}
