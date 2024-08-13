<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productVariants = [
            [
                "id" => "1",
                "name" => "Saltnic",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "2",
                "name" => "Freebase",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "3",
                "name" => "Fruity Series",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "4",
                "name" => "Pod Device",
                "description" => "lorem impsum dolor sit description"
            ],
        ];

        foreach ($productVariants as $productVariant) {
            Variant::create($productVariant);
        }
    }
}
