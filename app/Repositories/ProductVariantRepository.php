<?php

namespace App\Repositories;

use App\Contracts\ProductVariantRepositoryInterface;
use App\Models\Variant;

class ProductVariantRepository implements ProductVariantRepositoryInterface
{
    public function getAllProductVariant()
    {
        return Variant::all();
    }

    public function createProductVariant($productVariantData)
    {
        return Variant::create($productVariantData);
    }

    public function deleteProductVariant($productVariantId)
    {
        return Variant::where('id', $productVariantId)->delete();
    }

    public function getProductVariantById($productVariantId)
    {
        return Variant::where('id', $productVariantId)->first();
    }

    public function updateProductVariant($productVariantId, $productVariantUpdateData)
    {
        $productVariant = Variant::where('id', $productVariantId)->first();
        
        return $productVariant->update($productVariantUpdateData);
    }
}