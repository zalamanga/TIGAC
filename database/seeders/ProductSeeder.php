<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageBaseURL = 'images/products/';

        $products = [
            [
                "id" => 1,
                "name" => "Pocket Rockid Cosmic Strawberry Fizz",
                "image" => $imageBaseURL . "pocket rockid.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 120000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 2,
                "name" => "Jaxel Mylkcheese Crackers",
                "image" => $imageBaseURL . "jaxel mylkcheese.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 125000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 3,
                "name" => "SLANK VIRUS LIQUID AUTHENTIC CHEESETART",
                "image" => $imageBaseURL . "slank virus.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 125000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 4,
                "name" => "Tokyo Pie Series V1 Buttermilk",
                "image" => $imageBaseURL . "tokyo pie.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 125000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 5,
                "name" => "Ghost Rabbit Berry Yogurt Sundae",
                "image" => $imageBaseURL . "ghost rabbit.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 87000,
                "stock" => 10,
                "volume" => "30ml",
                "category" => "liquid",
                "variants" => ["12mg"]
            ],
            [
                "id" => 6,
                "name" => "SLANK V3 FULLMOON",
                "image" => $imageBaseURL . "slank v3 fullmoon.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 90000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 7,
                "name" => "Lunar Keev Korean Bento Cake",
                "image" => $imageBaseURL . "lunar keev korean.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 121000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 8,
                "name" => "Freebase N Podfriendly Ghost Monkey",
                "image" => $imageBaseURL . "Freebase N Podfriendly Ghost Monkey.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 121000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 9,
                "name" => "HOMPIMPA YOYO BERRY CEREAL BUTTER TART",
                "image" => $imageBaseURL . "HOMPIMPA YOYO BERRY CEREAL BUTTER TART.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 90000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
            [
                "id" => 10,
                "name" => "Slank March 10",
                "image" => $imageBaseURL . "Slank March 10.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 125000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ]
        ];

        foreach ($products as $productData) {
            $category = ProductCategory::where('name', $productData['category'])->first();
            $product = Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'rating' => $productData['rating'],
                'price' => $productData['price'],
                'discount_percent' => '10',
                'is_active' => '1',
                'is_hot_item' => '1',
                'stock' => $productData['stock'],
                'volume' => $productData['volume'],
                'product_category_id' => $category->id,
            ]);

            ProductImage::create([
                'product_id' => $productData['id'],
                'name' => $productData['image'],
                'image_path' => $productData['image']
            ]);

            $variantIds = Variant::whereIn('name', $productData['variants'])->pluck('id');
            $product->variants()->attach($variantIds);
        }
    }
}
