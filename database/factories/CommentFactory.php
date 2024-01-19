<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'my_comment'=>$this->faker->unique()->realText($maxChars=200),
            'comment_likes'=>$this->faker->numberBetween(0,50),
            'idea_id'=>$this->faker->numberBetween(1,10),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'), 
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'), 
        
        ];
    }
}
