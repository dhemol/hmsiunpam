<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'category_id' => $this->faker->unique()->numberBetween(1, 6),
            'title' => $this->faker->sentence(mt_rand(2, 10)),
            'slug' => $this->faker->slug(),
            'cost' => $this->faker->numberBetween(50000, 150000),
            'description' => $this->faker->sentence(mt_rand(5, 10)),
            'image' => $this->faker->imageUrl(640, 480),
            'start' => $this->faker->date('Y-m-d'),
            'end' => $this->faker->date('Y-m-d'),
        ];
    }
}
