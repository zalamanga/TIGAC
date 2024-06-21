<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productVariants = [
            [
                "id" => "1",
                "name" => "3mm",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "2",
                "name" => "6mm",
                "description" => "lorem impsum dolor sit description"
            ],
        ];

        foreach($productVariants as $productVariant) {
            ProductVariant::create($productVariant);
        }
    }
}
