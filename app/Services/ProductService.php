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
        $this->productRepositoryInterface->getAllProducts();
    }
}