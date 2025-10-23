<?php

namespace App\Http\Controllers\web;
use app\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::cursorPaginate(20); // Changed from paginate() to cursorPaginate() so tha page number is not 1, 2, 3, instead it's uuids.
        return view('tag.index', ['tags' => $data, 'title' => 'Tags']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tag.show', ['tag' => $tag, 'title' => 'Tag']);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }


}
