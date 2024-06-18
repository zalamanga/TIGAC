<?php

namespace App\Http\Controllers;

use App\DataTables\ProductCategoryDataTable;
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
}
