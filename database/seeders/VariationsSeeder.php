<?php

namespace Database\Seeders;

use App\Models\Variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationsSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run()
    {   

        //Breaking Changes, want to add a new variation?? make sure to update products seeder.
        
        Variation::create([
            'name' => 'Can',
        ]);

        Variation::create([
            'name' => 'Box',
        ]);

        Variation::create([
            'name' => '500ml Bottle',
        ]);

        Variation::create([
            'name' => '250ml Bottle',
        ]);

        Variation::create([
            'name' => '1L Bottle',
        ]);

        Variation::create([
            'name' => '1.25L Bottle',
        ]);

        Variation::create([
            'name' => '1.5L Bottle',
        ]);

        Variation::create([
            'name' => 'Cans X6(330ml)'
        ]);

        Variation::create([
            'name' => 'Carton X12(500ml)'
        ]);

        Variation::create([
            'name' => 'Carton X12(1L)'
        ]);

        Variation::create([
            'name' => 'Carton X12(1.5L)'
        ]);

        Variation::create([
            'name' => 'Carton X24(1.5L)'
        ]);

        Variation::create([
            'name' => '375ml Glass Bottle',
        ]);

        Variation::create([
            'name' => '1 Pcs',
        ]);
    }
}
