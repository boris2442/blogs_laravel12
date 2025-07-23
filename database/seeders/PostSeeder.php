<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();
        Post::factory()
            ->count(30) // Generates 10 posts
            ->sequence(
                fn($sequence) => [
                    'category_id' => $categories->random()->id,
                ]
            )
            ->create()
            ->each(fn($post) => $post->tags()->attach(
                $tags->random(rand(0, 3))->pluck('id')
            ));
    }
}
