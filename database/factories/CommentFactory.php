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
        $created_at = $this->faker->dateTimeBetween('-1 year', 'now');
        return [
            'content' => $this->faker->paragraph(),
            'created_at' => $created_at,
            'updated_at' => $created_at, // Sets the same timestamp for both created_at and updated_at
            'post_id' => \App\Models\Post::factory(), // Associate with a post
            'user_id' => \App\Models\User::factory(), // Associate with a user
        ];
    }
}
