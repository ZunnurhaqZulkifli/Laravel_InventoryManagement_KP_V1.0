<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'H4CK3RZzZ',
            'password' => 'secret123',
            'email' => 'zunnurclash24@gmail.com',
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'John Doe',
            'password' => 'secret123',
            'email' => 'john@gmail.com',
            'is_admin' => false,
        ]);
    }
}
