<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::factory()->create([
            'name' => 'Iphone 15',
            'description' => 'The best smartphone ever',
        ]);

        $category = Category::where('name', 'Smartphones')->first();
        $product->categories()->attach($category);
    }
}
