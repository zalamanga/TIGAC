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

    public function createProductCategory($productCategoryData)
    {
        return ProductCategory::create($productCategoryData);
    }

    public function deleteProductCategory($productCategoryId)
    {
        return ProductCategory::where('id', $productCategoryId)->delete();
    }

    public function getProductCategoryById($productCategoryId)
    {
        return ProductCategory::where('id', $productCategoryId)->first();
    }

    public function changeActiveStatus($productCategoryId, $requestData)
    {
        $productCategory = $this->getProductCategoryById($productCategoryId);

        $productCategory->is_active = $requestData;

        $productCategory->save();
    }
}
