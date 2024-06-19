<?php

namespace App\Http\Controllers;

use App\DataTables\ProductCategoryDataTable;
use App\Http\Requests\ProductCategoryRequest;
use App\Services\ProductCategoryService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    protected $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index(ProductCategoryDataTable $dataTable)
    {
        $title = 'Product Category List';


        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.product-category.index", $data);
    }

    public function store(ProductCategoryRequest $productCategoryRequest)
    {
        $productCategoryData = $productCategoryRequest->validated();

        $this->productCategoryService->createProductCategory($productCategoryData);

        Alert::success('Success', 'Success create new category');
        return redirect()->route('admin.product.product-category.index');
    }

    public function destroy($productCategoryId)
    {
        $this->productCategoryService->deleteProductCategory($productCategoryId);

        Alert::success('Success', 'Success delete category');
        return redirect()->route('admin.product.product-category.index');
    }
}
