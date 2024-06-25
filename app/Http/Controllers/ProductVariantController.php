<?php

namespace App\Http\Controllers;

use App\DataTables\ProductVariantDataTable;
use App\Http\Requests\ProductVariantRequest;
use App\Http\Requests\ProductVariantUpdateRequest;
use App\Models\ProductVariant;
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
        $title = 'Product Variant List';

        $data = [
            'title' => $title,
        ];

        return $dataTable->render("pages.admin.product-variant.index", $data);
    }

    public function create()
    {
        $title = 'Create New Product Variant';

        return view('pages.admin.product-variant.create', [
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

    public function show($productVariantId)
    {
        $title = 'Product Variant Detail';
        $productVariant = $this->productVariantService->getProductVariantById($productVariantId);

        return view('pages.admin.product-variant.show', compact(
            'productVariant',
            'title'
        ));
    }

    public function update($productVariantId, ProductVariantUpdateRequest $productVariantUpdateRequest)
    {
        $productVariantData = $productVariantUpdateRequest->validated();

        try {
            $this->productVariantService->updateProductVariant($productVariantId, $productVariantData);
            Alert::success('Success', 'Success update variant');
            return redirect()->route('admin.product.product-variant.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Failed update variant');
            return redirect()->route('admin.product.product-variant.index');
        }
    }

    public function edit($productVariantId)
    {
        $title = 'Product Variant Update';
        $productVariant = $this->productVariantService->getProductVariantById($productVariantId);

        return view('pages.admin.product-variant.show', compact(
            'productVariant',
            'title'
        ));        
    }

    public function destroy($productVariantId)
    {
        $this->productVariantService->deleteProductVariant($productVariantId);

        Alert::success('Success', 'Success delete variant');
        return redirect()->route('admin.product.product-variant.index');
    }
}
