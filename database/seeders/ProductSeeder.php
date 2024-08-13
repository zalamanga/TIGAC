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
                "name" => "Melon Mystic",
                "slug" => Str::slug("Melon Mystic", '-'),
                "image" => $imageBaseURL . "melon-mystic.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 115000,
                "stock" => 10,
                "is_device" => "0",
                "is_collaboration_project" => "0",
                "volume" => "60ml",
                "category" => "Tigac Saltnic",
                "variants" => ["Saltnic", "Fruity Series"]
            ],
            [
                "id" => 2,
                "name" => "Mango Madness",
                "slug" => Str::slug("Mango Madness", '-'),
                "image" => $imageBaseURL . "mango_madness.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 115000,
                "stock" => 10,
                "is_device" => "0",
                "is_collaboration_project" => "0",
                "volume" => "60ml",
                "category" => "Tigac Saltnic",
                "variants" => ["Saltnic", "Fruity Series"]
            ],
            [
                "id" => 3,
                "name" => "Tigac STIG Pod Kit",
                "slug" => Str::slug("Tigac STIG Pod Kit", '-'),
                "image" => $imageBaseURL . "stig.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 320000,
                "stock" => 10,
                "is_device" => "1",
                "is_collaboration_project" => "0",
                "volume" => "60ml",
                "category" => "Pod Device",
                "variants" => ["Pod Device"]
            ],
            [
                "id" => 4,
                "name" => "Electra Quinn",
                "slug" => Str::slug("Electra Quinn", '-'),
                "image" => $imageBaseURL . "electra-quinn.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!",
                "rating" => 5,
                "price" => 120000,
                "stock" => 10,
                "is_device" => "0",
                "is_collaboration_project" => "1",
                "volume" => "60ml",
                "category" => "Creme & Crime",
                "variants" => ["Freebase"]
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
                'is_device' => '1',
                'is_collaboration_project' => '1',
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
