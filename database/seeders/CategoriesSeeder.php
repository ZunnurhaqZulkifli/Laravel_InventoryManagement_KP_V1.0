<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {   
        
        Category::create([
            'name' => 'Drinks',
        ]);

        Category::create([
            'name' => 'Food',
        ]);

        Category::create([
            'name' => 'Snacks',
        ]);

        Category::create([
            'name' => 'Medicine',
        ]);

        Category::create([
            'name' => 'Utilities',
        ]);

        Category::create([
            'name' => 'Toiletaries'
        ]);

        Category::create([
            'name' => 'Raw Ingredients',
        ]);

        Category::create([
            'name' => 'Miscellaneous',
        ]);
    }
}
