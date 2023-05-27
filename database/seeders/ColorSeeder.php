<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['white', 'blue', 'red', 'black'];

        foreach ($colors as $color) {
            Color::create([
                'name' => $color,
                'slug' => Str::slug($color),
            ]);
        }
    }
}
