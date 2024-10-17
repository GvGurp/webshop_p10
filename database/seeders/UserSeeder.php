<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

// Import User model
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // You can create a user with specific data
        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phonenumber' => '0612456332',
            'role' => 'user',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'), // Encrypt the password
        ]);
        User::factory(10)->create();
    }

}
