<?php

namespace App\Http\Controllers;

use App\DataTables\ProductCategoryDataTable;
use App\Http\Requests\ProductCategoryRequest;
use App\Services\ProductCategoryService;
use Illuminate\Http\Request;

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

    public function store(ProductCategoryRequest $productCategoryRequest, ProductCategoryDataTable $dataTable)
    {
        $productCategoryData = $productCategoryRequest->validated();

        $title = 'Product Category List';

        $this->productCategoryService->createProductCategory($productCategoryData);

        session()->flash('status', 'success');
        session()->flash('message', 'Success create new category');

        return redirect()->route('admin.product.product-category.index');
    }
}
