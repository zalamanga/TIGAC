<?php

namespace App\Services;

use App\Repositories\ProductVariantRepository;

class ProductVariantService
{
    protected $productVariantRepository;

    public function __construct(ProductVariantRepository $productVariantRepository)
    {
        return $this->productVariantRepository = $productVariantRepository;
    }

    public function getAllProductVariant()
    {
        return $this->getAllProductVariant();
    }

    public function createProductVariant($productVariantData)
    {
        return $this->productVariantRepository->createProductVariant($productVariantData);
    }

    public function getProductVariantById($productVariantId)
    {
        return $this->productVariantRepository->getProductVariantById($productVariantId);
    }

    public function updateProductVariant($productVariantId, $productVariantData)
    {
        return $this->productVariantRepository->updateProductVariant($productVariantId, $productVariantData);
    }

    public function deleteProductVariant($productVariantId)
    {
        return $this->productVariantRepository->deleteProductVariant($productVariantId);
    }


}
