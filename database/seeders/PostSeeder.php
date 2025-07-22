<?php

namespace Database\Seeders;

use App\Models\Post;
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
        Post::factory()
            ->count(30) // Generates 10 posts
            ->sequence(
                fn($sequence) => [
                    'category_id' => $categories->random()->id,
                ]
            )
            ->create();
    }
}
