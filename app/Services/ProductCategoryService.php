<?php

namespace App\Services;

use App\Contracts\ProductCategoryRepositoryInterface;

class ProductCategoryService
{
    protected $productCategoryRepositoryInterface;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepositoryInterface)
    {
        $this->productCategoryRepositoryInterface = $productCategoryRepositoryInterface;
    }

    public function getProductCategories()
    {
        return $this->productCategoryRepositoryInterface->getProductCategories();
    }

    public function getProductCategoryById($productCategoryId)
    {
        return $this->productCategoryRepositoryInterface->getProductCategoryById($productCategoryId);
    }

    public function updateProductCategory($productCategoryId, $productCategoryUpdateRequest)
    {
        return $this->productCategoryRepositoryInterface->updateProductCategory($productCategoryId, $productCategoryUpdateRequest);
    }

    public function createProductCategory($data)
    {
        return $this->productCategoryRepositoryInterface->createProductCategory($data);
    }

    public function deleteProductCategory($productCategoryId)
    {
        return $this->productCategoryRepositoryInterface->deleteProductCategory($productCategoryId);
    }

    public function changeProductCategoryActiveStatus($productCategoryId, $requestData)
    {
        return $this->productCategoryRepositoryInterface->changeActiveStatus($productCategoryId, $requestData);
    }
}
