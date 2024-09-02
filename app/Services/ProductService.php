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

    public function getIsCollaborationProducts($isCollaborationProducts)
    {
        return $this->productRepositoryInterface->getIsCollaborationProducts($isCollaborationProducts);
    }

    public function getProductById($productId)
    {
        return $this->productRepositoryInterface->getProductById($productId);
    }

    public function getProductBySlug($productSlug)
    {
        return $this->productRepositoryInterface->getProductBySlug($productSlug);
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
                'is_device' => $requestProductData['is_device'],
                'is_collaboration_project' => $requestProductData['is_collaboration_project'],
                'stock' => $requestProductData['stock'],
                'product_external_link' => $requestProductData['product_external_link'],
            ];

            $product = $this->productRepositoryInterface->createProduct($productData);

            // handle image input
            if (array_key_exists('images', $requestProductData)) {
                foreach ($requestProductData['images'] as $index => $imageFile) {
                    $imagePath = $imageFile->store();

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

    public function deleteProductImage($productId, $productImageId)
    {
        $this->productRepositoryInterface->deleteProductImage($productId, $productImageId);
    }

    public function deleteProduct($productId)
    {
        return $this->productRepositoryInterface->deleteProductById($productId);
    }

    public function updateProduct($productId, $requestProductData)
    {
        $product = $this->productRepositoryInterface->getProductById($productId);

        $productData = [
            'sku' => $requestProductData['sku'],
            'name' => $requestProductData['name'],
            'description' => $requestProductData['description'],
            'product_category_id' => $requestProductData['product_category_id'],
            'price' => $requestProductData['price'],
            'discount_percent' => $requestProductData['discount_percent'],
            'is_active' => $requestProductData['is_active'],
            'is_hot_item' => $requestProductData['is_hot_item'],
            'is_device' => $requestProductData['is_device'],
            'is_collaboration_project' => $requestProductData['is_collaboration_project'],
            'stock' => $requestProductData['stock'],
            'product_external_link' => $requestProductData['product_external_link'],
        ];

        // handle image input
        if (array_key_exists('images', $requestProductData)) {
            foreach ($requestProductData['images'] as $index => $imageFile) {
                $imagePath = $imageFile->store();

                $imageData = [
                    'image_path' => $imagePath,
                    'name' => $requestProductData['image_name'][$index],
                    'description' => $requestProductData['image_description'][$index],
                ];

                $this->productRepositoryInterface->storeProductImage($product, $imageData);
            }
        }

        if (array_key_exists('product_variants', $requestProductData)) {
            $this->productRepositoryInterface->syncProductvariant($product, $requestProductData['product_variants']);
        } else {
            $this->productRepositoryInterface->syncProductVariant($product, []);
        }

        return $this->productRepositoryInterface->updateProduct($productId, $productData);
    }
}
