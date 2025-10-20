<?php

namespace App\Http\Controllers;
use App\Models\Post;

class PostController extends Controller
{
    //
    function index()
    {
        $data = Post::cursorPaginate(4); // Changed from paginate() to cursorPaginate() so tha page number is not 1, 2, 3, instead it's uuids.
        return view('post.index', ['posts' => $data, 'title' => 'Blog']);

    }

    function create()
    {

        // Reset Faker's unique memory before creating new posts
        //fake()->unique(true);  // ✅ resets the global faker instance

        Post::factory()->count(100)->create();
        return redirect('/blog');
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'title' => 'Show Post']);
    }

    function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/blog');
    }
}
