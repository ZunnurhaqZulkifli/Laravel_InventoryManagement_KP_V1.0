<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Products::create([
            'name' => 'Coca Cola',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 1.20,
            'variation_id' => 4,
            'quantity' => 4,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Coca Cola',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 2.00,
            'variation_id' => 1,
            'quantity' => 3,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Coca Cola',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 2.80,
            'variation_id' => 6,
            'quantity' => 5,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Reduced',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 10,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Zero',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 13,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Original',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 12,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Lime',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 3,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Berry',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 10,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Grape',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 10,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Active',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'quantity' => 2,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Active',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'quantity' => 2,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Berry',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'quantity' => 4,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Original',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'quantity' => 3,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Lime',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'quantity' => 11,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Grape',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'quantity' => 8,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Zero',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'quantity' => 2,
            'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Root Beer',
            'flavour' => 'Root Beer',
            'brand_id' => 11,
            'category_id' => 1,
            'price' => 6.00,
            'variation_id' => 13,
            'quantity' => 6,
            'barcode' => 0000,
        ]);

    }
}
