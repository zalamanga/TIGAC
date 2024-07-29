<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $productService;
    protected $productCategoryService;
    protected $productVariantService;

    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService, ProductVariantService $productVariantService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->productVariantService = $productVariantService;
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
        $title = 'Product Detail.';
        $product = $this->productService->getProductById($productId);
        $productVariants = [];

        foreach ($product->variants as $variant) {
            array_push($productVariants, $variant->name);
        }


        $data = [
            'title' => $title,
            'product' => $product,
            'productVariants' => $productVariants
        ];

        return view("pages.admin.product.show", $data);
    }

    public function create()
    {
        $title = 'Add New Product';
        $productCategories = $this->productCategoryService->getProductCategories();
        $productVariants = $this->productVariantService->getAllProductVariant();

        $data = [
            'title' => $title,
            'productCategories' => $productCategories,
            'productVariants' => $productVariants
        ];

        return view("pages.admin.product.create", $data);
    }

    public function store(ProductRequest $productRequest)
    {
        try {
            $productRequest = $productRequest->validated();


            $this->productService->storeProductData($productRequest);

            Alert::success('Success', 'Success Add Product');
            return redirect()->route('admin.products.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Failed to Add a Product');
            return redirect()->route('admin.products.create');
        }
    }

    public function destroy($productId)
    {
        $this->productService->deleteProduct($productId);
        Alert::success('Success', 'Success Delete Product');
        return redirect()->route('admin.products.index');
    }
}
