<?php

namespace App\Services;

use App\Contracts\ProductCategoryRepositoryInterface;

class ProductCategoryService
{
    protected $productCartegoryRepositoryInterface;

    public function __construct(ProductCategoryRepositoryInterface $productCartegoryRepositoryInterface)
    {
        $this->productCartegoryRepositoryInterface = $productCartegoryRepositoryInterface;
    }

    public function getProductCategories()
    {
        return $this->productCartegoryRepositoryInterface->getProductCategories();
    }

    public function createProductCategory($data) {
        return $this->productCartegoryRepositoryInterface->createProductCategory($data);
    }
}
