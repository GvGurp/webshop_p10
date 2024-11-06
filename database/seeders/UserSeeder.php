<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update a specific user
        User::updateOrCreate(
            ['email' => 'johndoe@example.com'],  // Check for this email
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'phonenumber' => '0612456332',
                'role' => 'user',
                'password' => bcrypt('password'), // Encrypt the password
            ]
        );

        // Generate 10 additional random users
        User::factory(10)->create();
    }
}
