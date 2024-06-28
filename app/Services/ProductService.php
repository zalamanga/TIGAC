<?php

namespace App\Services;

use App\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface) {
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
        $imagesData;
    }
}