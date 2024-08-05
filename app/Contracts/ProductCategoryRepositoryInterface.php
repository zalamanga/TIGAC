<?php

namespace App\Contracts;

interface ProductCategoryRepositoryInterface
{
    public function getProductCategories();
    public function createProductCategory($productCategoryData);
    public function deleteProductCategory($productCategoryId);
    public function updateProductCategory($productCategoryId, $productUpdateRequestData);
    public function getProductCategoryById($productCategoryId);
    public function changeActiveStatus($productCategoryId, $data);
}
