<?php

namespace App\Services;

use App\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function getProducts()
    {
        return $this->productRepositoryInterface->getAllProducts();
    }

    public function getProductById($productId)
    {
        return $this->productRepositoryInterface->getProductById($productId);
    }

    public function storeProductData($requestProductData)
    {
        DB::beginTransaction();
        try {
            $productData = [
                'sku' => $requestProductData['sku'],
                'name' => $requestProductData['name'],
                'description' => $requestProductData['description'],
                'product_category_id' => $requestProductData['product_category_id'],
                'price' => $requestProductData['price'],
                'discount_percent' => $requestProductData['discount_percent'],
                'is_active' => $requestProductData['is_active'],
                'is_hot_item' => $requestProductData['is_hot_item'],
                'stock' => $requestProductData['stock']
            ];

            $product = $this->productRepositoryInterface->createProduct($productData);

            // handle image input
            if (array_key_exists('images', $requestProductData)) {
                foreach ($requestProductData['images'] as $index => $imageFile) {
                    $imagePath = $imageFile->store('images/products', 'public');

                    $imageData = [
                        'image_path' => $imagePath,
                        'name' => $requestProductData['image_name'][$index],
                        'description' => $requestProductData['image_description'][$index],
                    ];

                    $this->productRepositoryInterface->storeProductImage($product, $imageData);
                }
            }
            if (array_key_exists('product_variants', $requestProductData)) {
                $this->productRepositoryInterface->attachProductVariant($product, $requestProductData['product_variants']);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function deleteProduct($productId)
    {
        return $this->productRepositoryInterface->deleteProductById($productId);
    }
}
