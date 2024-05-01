<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributesData = [
            'Size',
            'Capacity',
            'Colour',
        ];

        foreach ($attributesData as $attributeName) {
            Attribute::create([
                'name' => $attributeName,
            ]);
        }
    }
}
