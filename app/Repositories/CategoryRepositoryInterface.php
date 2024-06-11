<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($categoryId);
    public function deleteCategory($categoryId);
    public function createCategory(array $categoryData);
    public function updateCategory($categoryId, array $categoryData);
    public function getAvailableCategories();
    public function findByName($categoryName);

    // Add more methods as per your application needs
}
