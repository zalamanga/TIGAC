<?php

namespace App\Http\Controllers;

use App\DataTables\ProductVariantDataTable;
use App\Http\Requests\ProductVariantRequest;
use App\Services\ProductVariantService;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(ProductVariantRequest $productVariantRequest)
    {
        $productVariantData = $productVariantRequest->validated();

        $this->productVariantService->createProductVariant($productVariantData);

        Alert::success('Success', 'Success create new category');
        return redirect()->route('admin.product.product-variant.index');

    }
}
