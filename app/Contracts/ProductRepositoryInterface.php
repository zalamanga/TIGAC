<?php

namespace App\Contracts;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function createProduct($requestCreateData);
    public function storeProductImage($product, $requestImageData);
    public function getProductById($productId);
    public function updateProduct($productId, $requestUpdateData);
    public function deleteProductById($productId);
}