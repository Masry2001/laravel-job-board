<?php

namespace App\Http\Controllers\api\version1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(10);
        return response()->json(["Data" => $comments, "Message" => "Comments Retrieved Successfully"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        return response()->json(["Data" => $comment, "Message" => "Comment Created Successfully."], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $this->checkCommentExists($comment);
        return response()->json(["Data" => $comment, "Message" => "Comment Retrieved Successfully."], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->checkCommentExists($comment);
        $comment->update($request->all());
        return response()->json(["Data" => $comment, "Message" => "Comment Updated Successfully."], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->checkCommentExists($comment);
        $comment->delete();
        return response()->json(["Data" => $comment, "Message" => "Comment Deleted Successfully."], 200);
    }
    private function checkCommentExists($comment)
    {
        if (!$comment) {
            return response()->json(["Data" => $comment, "Message" => "Comment Not Found"], 404);
        }
    }
}
