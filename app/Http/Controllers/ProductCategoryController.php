<?php

namespace App\Http\Controllers;

use App\DataTables\ProductCategoryDataTable;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Services\ProductCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function create()
    {
        $title = 'Create New Product Category';

        return view('pages.admin.product-category.create', [
            'title' => $title
        ]);
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

    public function changeActiveStatus($productCategoryId, Request $request)
    {
        $this->productCategoryService->changeProductCategoryActiveStatus($productCategoryId, $request->status);

        Alert::success('Success', 'Success change product category active status');
        return redirect()->route('admin.product.product-category.index');
    }

    public function edit($productCategoryId)
    {
        $title = 'Product Category Update';
        $productCategory = $this->productCategoryService->getProductCategoryById($productCategoryId);

        return view('pages.admin.product-category.show', compact(
            'productCategory',
            'title'
        ));
    }

    public function show($productCategoryId)
    {
        $title = 'Product Category Detail';
        $productCategory = $this->productCategoryService->getProductCategoryById($productCategoryId);

        return view('pages.admin.product-category.show', compact(
            'productCategory',
            'title'
        ));
    }

    public function update($productCategoryId, ProductCategoryUpdateRequest $productCategoryUpdateRequest)
    {
        $productCategoryData = $productCategoryUpdateRequest->validated();

        try {
            $this->productCategoryService->updateProductCategory($productCategoryId, $productCategoryData);
            Alert::success('Success', 'Success update Category');
            return redirect()->route('admin.product.product-category.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Failed update Category');
            return redirect()->route('admin.product.product-category.index');
        }
    }
}
