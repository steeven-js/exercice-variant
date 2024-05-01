<?php

namespace App\Repositories;

use App\Models\Sku;

class SkuRepository implements SkuRepositoryInterface
{
    public function getAllSkus()
    {
        return Sku::all();
    }

    public function getSkuById($productId)
    {
        return Sku::findOrFail($productId);
    }

    public function deleteSku($productId)
    {
        Sku::destroy($productId);
    }

    public function createSku(array $productData)
    {
        return Sku::create($productData);
    }

    public function updateSku($productId, array $productData)
    {
        return Sku::whereId($productId)->update($productData);
    }

    public function getAvailableSkus()
    {
        return Sku::where('is_available', true);
    }
}
