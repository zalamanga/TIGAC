<?php

namespace App\Contracts;

interface ProductCategoryRepositoryInterface
{
    public function getProductCategories();
    public function createProductCategory($productCategoryData);
    public function deleteProductCategory($productCategoryId);
    public function getProductCategoryById($productCategoryId);
}