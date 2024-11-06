<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'phonenumber' => $this->faker->phoneNumber,
            'role' => 'user',
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password
        ];
    }
}
