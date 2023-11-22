<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $title = $faker->sentence;
            $slug = Str::slug($title);
            $desc = $faker->paragraph;
            $img = 'laravel.png'; // Sesuaikan dengan lokasi gambar Anda
            $views = $faker->numberBetween(100, 1000);
            $categoryId = $faker->numberBetween(1, 5); // Sesuaikan dengan kategori yang sudah ada

            Article::create([
                'category_id' => $categoryId,
                'title' => $title,
                'slug' => $slug,
                'desc' => $desc,
                'img' => $img,
                'status' => '1',
                'views' => $views,
                'publish_date' => '2023-11-22',
                'user_id' => '1',
            ]);
        }
    }
}
