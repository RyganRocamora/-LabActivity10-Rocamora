<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();
        $kagawad = Author::where('position', 'Kagawad')->first();

        // 40 Published Posts
        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 10 Draft Posts[cite: 8]
        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 1 Pinned Birthday Post[cite: 5, 8]
        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Rocamora Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Join us for the grand community clean-up drive at Purok Rocamora!',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-05-11 08:00:00',
        ]);
    }
}