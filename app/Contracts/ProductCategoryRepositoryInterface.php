<?php

namespace App\Contracts;

interface ProductCategoryRepositoryInterface
{
    public function getProductCategories();
    public function createProductCategory($data);
}