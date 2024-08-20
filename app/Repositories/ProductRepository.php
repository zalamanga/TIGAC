<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::orderBy('is_hot_item')->get();
    }

    public function getIsCollaborationProducts($isCollaborationProducts)
    {
        return Product::where('is_collaboration_project', $isCollaborationProducts)->get();
    }

    public function getProductById($productId)
    {
        return Product::where('id', $productId)->first();
    }

    public function getProductBySlug($productSlug)
    {
        return Product::where('slug', $productSlug)->first();
    }

    public function createProduct($requestCreateData)
    {
        return Product::create($requestCreateData);
    }

    public function storeProductImage($product, $requestImageData)
    {
        return $product->images()->create($requestImageData);
    }

    public function attachProductVariant($product, $requestProductVariantData)
    {
        return $product->variants()->attach($requestProductVariantData);
    }

    public function syncProductVariant($product, $requestProductVariantData)
    {
        return $product->variants()->sync($requestProductVariantData);
    }

    public function updateProduct($productId, $requestUpdateData)
    {
        return Product::where('id', $productId)->update($requestUpdateData);
    }

    public function deleteProductById($productId)
    {
        $product = Product::where('id', $productId)->first();

        if ($product->variants()->exists()) {
            $product->variants()->detach();
        }

        return $product->delete();
    }

    public function deleteProductImage($productId, $productImageId)
    {
        $product = Product::where('id', $productId)->first();

        $productImage = $product->images->where('id', $productImageId)->first();

        if (Storage::disk('public')->exists($productImage->image_path)) {
            Storage::disk('public')->delete($productImage->image_path);
        }

        return $productImage->delete();
    }
}
