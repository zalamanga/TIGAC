<?php

namespace App\Contracts;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductBySlug($productSlug);
    public function getIsCollaborationProducts($isCollaborationProducts);
    public function createProduct($requestCreateData);
    public function storeProductImage($product, $requestImageData);
    public function attachProductVariant($product, $requestProductVariantData);
    public function syncProductvariant($product, $requestProductVariantData);
    public function getProductById($productId);
    public function updateProduct($productId, $requestUpdateData);
    public function deleteProductById($productId);
    public function deleteProductImage($productId, $productImageId);
}
