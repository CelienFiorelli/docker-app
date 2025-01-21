<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $urlBase = 'https://pokehelp.github.io/Image/HOME/normal/';
        $images = [];
        for ($i = 1; $i <= 151; $i++) {
            $fill = str_repeat('0', 4 - strlen((string)$i));

            $images[] = [
                'name' => $fill . $i . '.png',
                'path' => $urlBase . $fill . $i . '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Image::insert($images);
    }
}
