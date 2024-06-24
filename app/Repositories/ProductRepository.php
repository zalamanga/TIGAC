<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::orderBy('is_hot_item')->get();
    }

    public function getProductById($productId)
    {
        return Product::where('id', $productId)->first();
    }

    public function createProduct($productId, $requestCreateData)
    {
        return Product::create($requestCreateData);
    }

    public function updateProduct($productId, $requestUpdateData)
    {
        return Product::where('id', $productId)->update($requestUpdateData);
    }

    public function deleteProductById($productId)
    {
        return Product::where('id', $productId)->delete();
    }
}