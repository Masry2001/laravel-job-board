<?php

namespace App\Http\Controllers\api\version1;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return response()->json(["Data" => $tags, "Message" => "Tags Retrieved Successfully"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        return response()->json(["Data" => $tag, "Message" => "Tag Created Successfully With ID: " . $tag->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $this->checkTagExists($tag);
        return response()->json(["Data" => $tag, "Message" => "Tag Retrieved Successfully"], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->checkTagExists($tag);
        $tag->update($request->all());
        return response()->json(["Data" => $tag, "Message" => "Tag Updated Successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $this->checkTagExists($tag);
        $tag->delete();
        return response()->json(["Data" => $tag, "Message" => "Tag Deleted Successfully"], 200);
    }

    private function checkTagExists($tag)
    {
        if (!$tag) {
            return response()->json(["Data" => $tag, "Message" => "Tag Not Found"], 404);
        }
    }
}
