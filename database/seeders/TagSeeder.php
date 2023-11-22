<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tags::create([
            'name' => 'Berita Teknologi',
            'slug' => 'berita-teknologi'
        ]);

        Tags::create([
            'name' => 'Destinasi Wisata',
            'slug' => 'destinasi-wisata'
        ]);

        Tags::create([
            'name' => 'Review Perangkat dan Aplikasi',
            'slug' => 'review-perangkat-dan-aplikasi'
        ]);

        Tags::create([
            'name' => 'Tutorial dan Panduan',
            'slug' => 'tutorial-dan-panduan'
        ]);

        Tags::create([
            'name' => 'Tips Perjalanan',
            'slug' => 'tips-perjalanan'
        ]);
    }
}
