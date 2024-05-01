<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Database\Seeder;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création ou récupération des attributs
        $sizeAttribute = Attribute::where('name', 'Size')->firstOrCreate(['name' => 'Size']);
        $capacityAttribute = Attribute::where('name', 'Capacity')->firstOrCreate(['name' => 'Capacity']);
        $colourAttribute = Attribute::where('name', 'Colour')->firstOrCreate(['name' => 'Colour']);

        // Récupération de l'iPhone 15
        $iphone15 = Product::where('name', 'Iphone 15')->first();

        $skusData = [
            [
                'sku_code' => 'PB00570856',
                'attributes' => [
                    'Size' => 'Small',
                    'Capacity' => '64GB',
                    'Colour' => 'Black',
                ],
            ],
            [
                'sku_code' => 'PB00570857',
                'attributes' => [
                    'Size' => 'Medium',
                    'Capacity' => '128GB',
                    'Colour' => 'White',
                ],
            ],
            [
                'sku_code' => 'PB00570858',
                'attributes' => [
                    'Size' => 'Large',
                    'Capacity' => '256GB',
                    'Colour' => 'Gold',
                ],
            ],
        ];

        foreach ($skusData as $data) {
            $sku = Sku::create([
                'product_id' => $iphone15->id,
                'sku' => $data['sku_code'],
                'unit_amount' => 999.99,
            ]);

            foreach ($data['attributes'] as $attributeName => $attributeValue) {
                $attribute = Attribute::where('name', $attributeName)->first();
                if ($attribute) {
                    $sku->attributes()->attach($attribute->id, ['value' => $attributeValue]);
                }
            }
        }
    }
}
