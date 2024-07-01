<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $productService;
    protected $productCategoryService;

    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService) {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index(ProductDataTable $dataTable)
    {
        $title = 'Product List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.product.index", $data);
    }

    public function show($productId)
    {
        $title = 'Product List';
        $product = $this->productService->getProductById($productId);

        $data = [
            'title' => $title,
            'product' => $product
        ];

        return view("pages.admin.product.show", $data);
    }

    public function create()
    {
        $title = 'Add New Product';
        $productCategories = $this->productCategoryService->getProductCategories();

        $data = [
            'title' => $title,
            'productCategories' => $productCategories
        ];

        return view("pages.admin.product.create", $data);
    }

    public function store(ProductRequest $productRequest)
    {
        try {
            $productRequest = $productRequest->validated();

            $this->productService->storeProductData($productRequest);

            Alert::success('Success', 'Success update Category');
            return redirect()->route('admin.produc.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Failed to Add a Product');
            return redirect()->route('admin.product.crete');
        }
    }
}
