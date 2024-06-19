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
                "id" => "1",
                "name" => "HexOhm",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "2",
                "name" => "eLiquids",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "3",
                "name" => "Molicel Vape Battery",
                "description" => "lorem impsum dolor sit description"
            ],
            [
                "id" => "4",
                "name" => "EZDripper",
                "description" => "lorem impsum dolor sit description"
            ],
        ];

        foreach($productCategories as $productCategory) {
            ProductCategory::create($productCategory);
        }
    }
}
