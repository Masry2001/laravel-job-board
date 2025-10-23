<?php

namespace App\Http\Controllers\api\version1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return response()->json(["Data" => $posts, "Message" => "Posts Retrieved Successfully"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json(["Data" => $post, "Message" => "Post Created Successfully"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->checkPostExists($post);
        return response()->json(["Data" => $post, "Message" => "Post Retrieved Successfully"], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->checkPostExists($post);
        $post->update($request->all());
        return response()->json(["Data" => $post, "Message" => "Post Updated Successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->checkPostExists($post);
        $post->delete();
        return response()->json(["Data" => $post, "Message" => "Post Deleted Successfully"], 200);
    }

    private function checkPostExists($post)
    {
        if (!$post) {
            return response()->json(["Data" => $post, "Message" => "Post Not Found"], 404);
        }
    }
}
