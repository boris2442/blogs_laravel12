<?php

namespace Database\Seeders;

use Str;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(['Livre', 'Jeux-video', 'Film']);
        $categories->each(fn($category) => Category::create([
            'name' => $category,
            'slug' => Str::slug($category)
        ]));
    }
}
