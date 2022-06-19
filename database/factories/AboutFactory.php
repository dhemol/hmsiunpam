<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
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
            'title' => $this->faker->sentence(mt_rand(2, 10)),
            'description' => $this->faker->sentence(mt_rand(10, 25)),
            'image' => $this->faker->imageUrl(640, 480),
        ];
    }
}
