<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Benutzer::create([
            "id" => 1,
            "fullName" => "Test User",
        ]);

        \App\Models\Zimmer::create([
            "id" => 1,
            "price" => 100,
            "betten" => 2,
            "gebuchtVon" => 1,
        ]);
    }
}
