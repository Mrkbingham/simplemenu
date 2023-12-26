<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 fake users
        \App\Models\User::factory(10)->create();

        // Create your test user
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>  Hash::make('simplemenu'),
        ]);

        // Create three fake menu categories - breakfast lunch and dinner
        \App\Models\MenuCategory::factory()->create([
            'name' => 'Breakfast',
            'description' => 'The things you like in the morning - or whenever really.  Breakfast all day!',
        ]);
        \App\Models\MenuCategory::factory()->create([
            'name' => 'Lunch',
            'description' => 'The things you like in the afternoon - or whenever really.  Lunch all day!',
        ]);
        \App\Models\MenuCategory::factory()->create([
            'name' => 'Dinner',
            'description' => 'The things you like in the evening - only in the evening.  We\'re serious about this.',
        ]);
    }
}
