<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(30)->create()
            ->each(function ($user) {
                $user->posts()->createMany(
                    Post::factory()->count(3)->make()->toArray()
                );
            });
    }
}
