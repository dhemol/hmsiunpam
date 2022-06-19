<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nik' => $this->faker->unique()->numberBetween(1, 100),
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'address' => $this->faker->address,
            'no_hp' => $this->faker->phoneNumber,
            'position' => $this->faker->jobTitle,
            'images' => $this->faker->imageUrl(640, 480),
            'role' => $this->faker->boolean,
        ];
    }
}
