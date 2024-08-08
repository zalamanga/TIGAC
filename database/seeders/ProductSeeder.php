<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                "slug" => Str::slug("Pocket Rockid Cosmic Strawberry Fizz", '-'),
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
                "slug" => Str::slug("Jaxel Mylkcheese Crackers", '-'),
                "image" => $imageBaseURL . "jaxel mylkcheese.jpg",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 125000,
                "stock" => 10,
                "volume" => "60ml",
                "category" => "liquid",
                "variants" => ["3mg", "6mg"]
            ],
        ];

        foreach ($products as $productData) {
            $category = ProductCategory::where('name', $productData['category'])->first();
            $product = Product::create([
                'name' => $productData['name'],
                'slug' => $productData['slug'],
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
                'name' => $productData['name'],
                'image_path' => $productData['image']
            ]);

            $variantIds = Variant::whereIn('name', $productData['variants'])->pluck('id');
            $product->variants()->attach($variantIds);
        }
    }
}
