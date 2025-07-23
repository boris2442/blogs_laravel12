<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        Post::factory()
            ->count(30) // Generates 10 posts
            ->sequence(
                fn($sequence) => [
                    'category_id' => $categories->random()->id,
                    'user_id' => $users->random()->id, // Assign a random user to each post
                    //'created_at' => now()->subDays(rand(1, 30)), // Random
                ]
            )
            ->hasComments(
                10,
                fn($sequence) => [
                    'user_id' => $users->random()->id,
                    'created_at' => now()->subDays(rand(1, 30)), // Randomly set created_at within the last 30 days
                ]
            ) // Each post will have 3 comments
            ->create()
            ->each(fn($post) => $post->tags()->attach(
                $tags->random(rand(0, 3))->pluck('id')
            ));
    }
}
