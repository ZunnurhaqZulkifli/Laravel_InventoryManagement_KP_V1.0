<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    Brand::create([
            'name' => 'Coca Cola',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Nestle',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Pepsi',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Red Bull',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'F&N',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Fanta',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Nescafe',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => '100 Plus',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Yeos',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Mountain Dew',
            'category_id' => 1,
        ]);

        Brand::create([
            'name' => 'Bundaberg',
            'category_id' => '1',
        ]);

        Brand::create([
            'name' => 'Samudera',
            'category_id' => 2,
        ]);

        Brand::create([
            'name' => 'Jack n Jill',
            'category_id' => 3,
        ]);

        Brand::create([
            'name' => 'Panadol',
            'category_id' => 4,
        ]);

    }
}
