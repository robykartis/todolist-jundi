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
            'name' => 'admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@localhost',
            'password' => bcrypt('123'),
        ]);
    }
}