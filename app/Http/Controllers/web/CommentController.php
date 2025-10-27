<?php

namespace App\Http\Controllers\web;
use app\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequestValidator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::latest()->cursorPaginate(4);
        return view('comment.index', ['comments' => $data, 'title' => 'Comments']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequestValidator $request)
    {
        // I made this step because the original user who created the post maybe remove the post while another person is trying to add a comment on that deleted post.
        $post = Post::findOrFail(request()->input('post_id'));

        $comment = new Comment();
        $comment->post_id = request()->input('post_id');
        $comment->author = request()->input('author');
        $comment->content = request()->input('content');
        $comment->save();
        // the method with add the key: success to the session. it is a flash message
        return redirect("/blog/$comment->post_id")->with('success', 'new comment added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comment.show', ['comment' => $comment, 'title' => 'Comment']);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {

        return view('comment.edit', ['comment' => $comment, 'title' => 'Comment']);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequestValidator $request, Comment $comment)
    {
        //
        $post = Post::findOrFail(request()->input('post_id'));

        $comment->author = request()->input('author');
        $comment->content = request()->input('content');
        $comment->save();
        // the method with add the key: success to the session. it is a flash message
        return redirect("/blog/$comment->post_id")->with('success', 'comment updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect("/blog/$comment->post_id")->with('success', 'comment deleted');
    }
}
