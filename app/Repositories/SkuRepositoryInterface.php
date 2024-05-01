<?php

namespace App\Repositories;

interface SkuRepositoryInterface
{
    public function getAllSkus();
    public function getSkuById($skuId);
    public function deleteSku($skuId);
    public function createSku(array $skuData);
    public function updateSku($skuId, array $skuData);
    public function getAvailableSkus();

    // Add more methods as per your application needs
}
