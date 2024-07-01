<?php

namespace App\Services;

use App\Contracts\ProductRepositoryInterface;

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
        // dd($requestProductData);

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

            // dd($productData, $requestProductData);

            $product = $this->productRepositoryInterface->createProduct($productData);

            // handle image input
            if ($requestProductData['images']) {
                foreach ($requestProductData['images'] as $index => $imageFile) {
                    $imagePath = $imageFile->store('images', 'public');

                    $imageData = [
                        'image_path' => $imagePath,
                        'name' => $requestProductData['image_name'][$index],
                        'description' => $requestProductData['image_description'][$index],
                    ];

                    $this->productRepositoryInterface->storeProductImage($product, $imageData);
                }
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
