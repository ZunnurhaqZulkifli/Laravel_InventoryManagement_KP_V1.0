<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
    
        if($this->command->confirm('Do you want to refresh the database')) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database Was Refreshed');
        }

        $this->call([
            UserSeeder::class,
            VariationsSeeder::class,
            CategoriesSeeder::class,
            BrandsSeeder::class,
            ProductsSeeder::class,
        ]);

        $this->command->call('inspire');
    }
}