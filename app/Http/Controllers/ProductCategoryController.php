<?php

namespace App\Http\Controllers;

use App\Services\ProductCategoryService;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $productCategories = $this->productCategoryService->getProductCategories();

        dd($productCategories);

        return view('pages.admin.productCategory.index', [
            'productCategories' => $productCategories, 
        ]);
    }
}
