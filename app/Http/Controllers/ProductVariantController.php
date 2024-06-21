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
        ;
        return $dataTable->render("pages.admin.product-category.index", $data);
    }
}
