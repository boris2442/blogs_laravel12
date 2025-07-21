<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'title' => $this->faker->unique()->sentence(6, true),
            // Generates a random title with 6 words
            'slug' => Str::slug($this->faker->unique()->sentence(6, true), '-'),
            'excerpt' => Str::limit($this->faker->paragraph(), 100), // Generates a short summary of the post
            'content' => $this->faker->paragraphs(3, true),
            'thumbnail' => $this->faker->imageUrl(), // Generates a random image URL
            'created_at' => $created_at,
            'updated_at' => $created_at, // Sets the same timestamp for both created_at and updated_at
        ];
    }
}
