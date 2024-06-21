<?php

namespace App\Contracts;

interface ProductVariantRepositoryInterface
{
    public function getAllProductVariant();
    public function createProductVariant($productVariantData);
    public function getProductVariantById($productVariantId);
    public function deleteProductVariant($productVariantId);
}