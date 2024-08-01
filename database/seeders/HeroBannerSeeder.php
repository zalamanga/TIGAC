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
        $imageBaseURL = 'images/products/';

        $heroBanners = [
            [
                "id" => "1",
                "name" => "idcard.png",
                "tagline" => "Test 1",
                "tagline_description" => "Test 1",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "idcard.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "2",
                "name" => "liquid.png",
                "tagline" => "Test 2",
                "tagline_description" => "Test 2",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "liquid.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "3",
                "name" => "totebag.png",
                "tagline" => "Test 3",
                "tagline_description" => "Test 3",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "totebag.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "4",
                "name" => "tumbler.png",
                "tagline" => "Test 4",
                "tagline_description" => "Test 4",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "tumbler.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "5",
                "name" => "varsity.png",
                "tagline" => "Test 5",
                "tagline_description" => "Test 5",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "varsity.png",
                "is_active" => 1,
                "is_priority" => 1,
            ],
        ];

        foreach ($heroBanners as $heroBanner) {
            HeroBanner::create($heroBanner);
        }
    }
}
