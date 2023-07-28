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
            'email' => 'john@mail.com',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Promoter 1',
            'password' => 'secret123',
            'email' => 'promoter1@mail.com',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Promoter 2',
            'password' => 'secret123',
            'email' => 'promoter2@mail.com',
            'is_admin' => false,
        ]);
    }
}
