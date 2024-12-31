<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Luis Cevallos',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Passw0rd'),
        ]);

        \App\Models\Property::factory(10)->create(
            [
                'slider' => true,
                'visible' => false,
            ]
        );

        \App\Models\Property::factory(50)->create();
    }
}
