<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\blogs\StoreBlogRequest;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Blog';
        $posts = Post::paginate(10);

        if ($request->ajax()) {
            return view('back.blog.partials.posts', compact('posts'))->render();
        }

        return view('back.blog.index', compact('title', 'posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Blog';
        $categories = BlogCategory::all();
        return view('back.blog.create',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();

        $image = $request->has('image');

        $newImageName = uniqid() . '.' . $image->getClientOriginalName();

        $image->storeAs('/public/blogs', $newImageName);

        $data['image'] = $newImageName;

        $data['slug'] = 'fsdngjsb1111ngsd';

        $data['user_id'] = 1;

        Post::create($data);

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
