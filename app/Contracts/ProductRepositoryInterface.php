<?php

namespace App\Contracts;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function createProduct($productId, $requestCreateData);
    public function getProductById($productId);
    public function updateProduct($productId, $requestUpdateData);
    public function deleteProductById($productId);
}