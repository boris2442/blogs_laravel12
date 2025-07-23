<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['fantastique', 'fantesie', 'policier', 'horreur', 'passion', 'Amour', 'eprouvante']);
        $tags->each(fn($tag) => \App\Models\Tag::create([
            'name' => $tag,
            'slug' => \Illuminate\Support\Str::slug($tag)
        ]));
    }
}
