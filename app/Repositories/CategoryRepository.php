<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($productId)
    {
        return Category::findOrFail($productId);
    }

    public function deleteCategory($productId)
    {
        Category::destroy($productId);
    }

    public function createCategory(array $productData)
    {
        return Category::create($productData);
    }

    public function updateCategory($productId, array $productData)
    {
        return Category::whereId($productId)->update($productData);
    }

    public function getAvailableCategories()
    {
        return Category::where('is_available', true);
    }

    public function findByName($categoryName)
    {
        return Category::where('name', $categoryName)->first();
    }
}
