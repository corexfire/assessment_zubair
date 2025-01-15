<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            'headline_content_1' => "Life is short",
            'headline_content_2' => "and the world 🌍",
            'headline_content_3' => "is Wide! 🏝️",
            'small_content' => "The vacation you deserve is closer than you think 😍",
            'circle_assets_1' => "helicopter.png",
            'circle_assets_2' => "mountain.png",
            'circle_assets_3' => "sailboat.png",
            'image_1' => "image_1.jpg",
            'image_2' => "image_2.jpg"
        ]);
    }
}
