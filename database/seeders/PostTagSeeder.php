<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all existing posts and tags
        $posts = Post::all();
        $tags = Tag::all();

        // Attach 1-5 random tags to each post
        foreach ($posts as $post) {
            $randomTags = $tags->random(rand(1, 5))->pluck('id');
            $post->tags()->sync($randomTags);
        }
    }
}
