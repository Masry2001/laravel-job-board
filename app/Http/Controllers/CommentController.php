<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    //

    function index()
    {
        $data = Comment::cursorPaginate(4);
        return view('comment.index', ['comments' => $data, 'title' => 'Comments']);

    }

    function create()
    {
        // Comment::create([
        //     'content' => $content,
        //     'post_id' => 3,
        //     'author' => 'Mohamed',
        // ]);
        Comment::factory()->count(500)->create();

        return redirect('/comments');
    }

    function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment, 'title' => 'Comment']);
    }
}
