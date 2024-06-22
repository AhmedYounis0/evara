<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\tags\StoreTagRequest;
use App\Http\Requests\tags\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Tags";
        $tags = Tag::all();
        return view('back.tags.index', compact('title', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "create tag";
        return view('back.tags.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();

        Tag::create($data);

        return to_route('tags.index')->with('success', 'Tag created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $title = "edit tag";
        return view('back.tags.edit', compact('title', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag->update($data);

        return to_route('tags.index')->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->products()->detach();
        $tag->delete();

        return to_route('tags.index')->with('success', 'Tag deleted successfully');
    }
}
