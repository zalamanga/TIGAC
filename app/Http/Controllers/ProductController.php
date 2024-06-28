<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
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

        $data = [
            'title' => $title
        ];

        return view("pages.admin.product.show", $data);
    }
}
