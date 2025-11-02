<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequestValidator;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::latest()->cursorPaginate(4); // Changed from paginate() to cursorPaginate() so tha page number is not 1, 2, 3, instead it's uuids.
        return view('post.index', ['posts' => $data, 'title' => 'Blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['title' => 'Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequestValidator $request)
    {

        $post = new Post();
        $post->title = $request->input('title');
        $post->user_id = auth()->id();
        $post->body = $request->input('body');
        $post->published = $request->has('published');
        $post->save();
        return redirect('/blog')->with('success', 'Post created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post, 'title' => 'Show Post']);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        //Gate::authorize('update', $post);
        return view('post.edit', ['title' => 'Edit Post', 'post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequestValidator $request, Post $post)
    {

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published = $request->has('published');
        $post->save();
        return redirect('/blog')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog')->with('success', 'Post Deleted successfully');

    }
}
