<?php

namespace App\Repositories;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function getProductCategories()
    {
        return ProductCategory::all();
    }
}