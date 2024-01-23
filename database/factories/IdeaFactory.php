<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content'=>$this->faker->unique()->realText($maxChars=200),
            'likes'=>$this->faker->numberBetween(0,50),
            'user_id'=>$this->faker->numberBetween(1,10),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'), 
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'), 
        ];
    }
}
