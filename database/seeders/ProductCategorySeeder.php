<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategories = [
            [
                "name" => "Tigac Saltnic",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "name" => "Pod Device",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "name" => "Creme & Crime",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "name" => "Pocket Rockid",
                "description" => "lorem impsum dolor sit description"
            ],
        ];

        foreach ($productCategories as $productCategory) {
            ProductCategory::create($productCategory);
        }
    }
}
