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
            'name' => 'Coca Cola Bottle (small)',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 1.20,
            'variation_id' => 4,
            'on_pressed' => 0,
            'quantity' => 4,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Coca Cola (can)',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 2.00,
            'variation_id' => 1,
            'on_pressed' => 0,
            'quantity' => 3,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Coca Bottle (1.25l)',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 2.80,
            'variation_id' => 6,
            'on_pressed' => 2,
            'quantity' => 5,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Reduced Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 10,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Zero Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 13,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Original Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 12,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Lime Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 3,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Berry Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 10,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Grape Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 10,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Active Bottle (small)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 2.50,
            'variation_id' => 3,
            'on_pressed' => 0,
            'quantity' => 2,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Active Bottle (big)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'on_pressed' => 0,
            'quantity' => 2,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Berry Bottle (big)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'on_pressed' => 0,
            'quantity' => 4,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Original Bottle (big)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'on_pressed' => 6,
            'quantity' => 3,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Lime Bottle (big)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'on_pressed' => 0,
            'quantity' => 11,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Grape Bottle (big)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'on_pressed' => 0,
            'quantity' => 8,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => '100 Plus Zero Bottle (big)',
            'brand_id' => 8,
            'category_id' => 1,
            'price' => 4.00,
            'variation_id' => 7,
            'on_pressed' => 0,
            'quantity' => 2,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Bundaberg (RootBeer)',
            'brand_id' => 11,
            'category_id' => 1,
            'price' => 6.00,
            'variation_id' => 13,
            'on_pressed' => 0,
            'quantity' => 6,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Bundaberg (GingerBeer)',
            'brand_id' => 11,
            'category_id' => 1,
            'price' => 6.00,
            'variation_id' => 13,
            'on_pressed' => 0,
            'quantity' => 6,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Bundaberg (Passionfruit)',
            'brand_id' => 11,
            'category_id' => 1,
            'price' => 6.00,
            'variation_id' => 13,
            'on_pressed' => 3,
            'quantity' => 6,
            // 'barcode' => 0000,
        ]);

        Products::create([
            'name' => 'Bundaberg (AppleCider)',
            'brand_id' => 11,
            'category_id' => 1,
            'price' => 6.00,
            'variation_id' => 13,
            'on_pressed' => 0,
            'quantity' => 6,
            // 'barcode' => 0000,
        ]);

    }
}
