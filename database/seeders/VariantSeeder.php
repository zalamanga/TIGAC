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
                "name" => "3mg",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "2",
                "name" => "6mg",
                "description" => "lorem impsum dolor sit description"
            ],
        ];

        foreach($productVariants as $productVariant) {
            Variant::create($productVariant);
        }
    }
}
