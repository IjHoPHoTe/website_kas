<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Wilayah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Fahmi Aziz',
            'email' => 'fahmi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'remember_token' => Str::random(50),
        ]);
        
    }
}