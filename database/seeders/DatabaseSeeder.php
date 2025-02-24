<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10) // Create 10 users
            ->has(
                Post::factory()
                    ->count(3) // Each user has 3 posts
                    ->has(
                        Comment::factory()
                            ->count(5) // Each post has 5 comments
                    )
            )
            ->create();
    }

}
