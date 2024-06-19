<?php

namespace App\Repositories;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function getProductCategories()
    {
        return ProductCategory::all();
    }

    public function createProductCategory($data)
    {
        try {
            ProductCategory::create($data);
        } catch (\Throwable $th) {
            Log::error('Failed to create product category: ' . $th->getMessage());
        }
    }
}