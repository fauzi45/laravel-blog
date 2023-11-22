<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Tambahkan data dummy
        Category::create([
            'name' => 'Teknologi',
            'slug' => 'Teknologi'
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'Teknologi'
        ]);

        Category::create([
            'name' => 'Travel',
            'slug' => 'Teknologi'
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'Teknologi'
        ]);

        Category::create([
            'name' => 'Hiburan',
            'slug' => 'Teknologi'
        ]);

        Category::create([
            'name' => 'Kuliner',
            'slug' => 'Teknologi'
        ]);
    }
}
