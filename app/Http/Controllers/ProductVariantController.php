<?php

namespace App\Http\Controllers;

use App\DataTables\ProductVariantDataTable;
use App\Services\ProductVariantService;

class ProductVariantController
{
    protected $productVariantService;

    public function __construct(ProductVariantService $productVariantService)
    {
        $this->productVariantService = $productVariantService;
    }

    public function index(ProductVariantDataTable $dataTable)
    {
        $title = 'Product Category List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.product-variant.index", $data);
    }

    public function create()
    {
        $title = 'Create New Product Variant';

        return view('pages.admin.product-variant.show', [
            'title' => $title
        ]);
    }
}
