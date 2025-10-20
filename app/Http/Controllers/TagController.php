<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;

class TagController extends Controller
{
    //
    function index()
    {
        $data = Tag::cursorPaginate(20); // Changed from paginate() to cursorPaginate() so tha page number is not 1, 2, 3, instead it's uuids.
        return view('tag.index', ['tags' => $data, 'title' => 'Tags']);

    }

    function create()
    {

        // Reset Faker's unique memory before creating new posts
        fake()->unique(true);  // ✅ resets the global faker instance

        Tag::factory()->count(20)->create();
        return redirect('/tags');
    }
    function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.show', ['tag' => $tag, 'title' => 'Tag']);
    }

    function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect('/tags');
    }

    function testManyToMany()
    {
        // Fetch all existing posts and tags
        $posts = Post::all();
        $tags = Tag::all();

        // Attach 1-5 random tags to each post (adjust rand() as needed)
        foreach ($posts as $post) {
            $randomTags = $tags->unique()->random(rand(1, 5)); // Pick random subset of tags
            $post->tags()->syncWithoutDetaching($randomTags); // “add these only if missing, don’t remove or duplicate existing ones.”
        }
        return redirect('/blog');
    }
}
