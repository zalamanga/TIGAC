<?php

namespace Database\Seeders;

use App\Models\HeroBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageBaseURL = 'images/hero_banners/';

        $heroBanners = [
            [
                "id" => "1",
                "name" => "1.png",
                "tagline" => "Test 1",
                "tagline_description" => "Test 1",
                "is_for_product_page" => "1",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "1.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "2",
                "name" => "2.png",
                "tagline" => "Test 2",
                "tagline_description" => "Test 2",
                "is_for_product_page" => "1",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "2.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "3",
                "name" => "3.png",
                "tagline" => "Test 3",
                "is_for_product_page" => "1",
                "tagline_description" => "Test 3",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "3.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
        ];

        foreach ($heroBanners as $heroBanner) {
            HeroBanner::create($heroBanner);
        }
    }
}
