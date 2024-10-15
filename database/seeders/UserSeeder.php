<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can create a user with specific data
        User::create([
            'firstname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'), // Encrypt the password
        ]);

    }
}
