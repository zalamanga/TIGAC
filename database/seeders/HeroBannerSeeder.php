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
                "description" => "",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "idcard.png",
                "media_link" => "",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "2",
                "name" => "liquid.png",
                "description" => "",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "liquid.png",
                "media_link" => "",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "3",
                "name" => "totebag.png",
                "description" => "",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "totebag.png",
                "media_link" => "",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "4",
                "name" => "tumbler.png",
                "description" => "",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "tumbler.png",
                "media_link" => "",
                "is_active" => 1,
                "is_priority" => 1,
            ],
            [
                "id" => "5",
                "name" => "varsity.png",
                "description" => "",
                "media_type" => "photo",
                "media_path" => $imageBaseURL . "varsity.png",
                "media_link" => "",
                "is_active" => 1,
                "is_priority" => 1,
            ],
        ];

        foreach ($heroBanners as $heroBanner) {
            HeroBanner::create($heroBanner);
        }
    }
}
