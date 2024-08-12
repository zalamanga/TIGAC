<?php

namespace Database\Seeders;

use App\Models\Masterpiece;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterpieceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageBaseURL = 'images/masterpiece_thumbnail/';

        $masterpiecies = [
            [
                "name" => "Tigac Saltnic Series",
                "slug" => "tigac-saltnic-series",
                "detail_link" => "#tigac-saltnic-series",
                "thumbnail" => $imageBaseURL . "masterpiece 1.png",
                "is_active" => "1",
            ],
            [
                "name" => "Tigac STIG",
                "slug" => "tigac-stig",
                "detail_link" => "#tigac-stig",
                "thumbnail" => $imageBaseURL . "masterpiece 3.png",
                "is_active" => "1",
            ]
        ];

        foreach ($masterpiecies as $masterpiece) {
            Masterpiece::create($masterpiece);
        }
    }
}
