<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(String $slug)
    {
        // fetch sub category using name
        $category = Category::where('slug', $slug)->firstOrFail();

        // add 1 to sub category views
        $category->category_views += 1;

        // push to database the updated views
        $category->save();

        // page title
        $title = $category->name;

        //fetch all sub categories
        $navCategories = Category::whereNotNull('category_id')->get();

        //fetch all categories and sub categories
        $categories = Category::with('children')->whereNull('category_id')->get();

        return view('front.category.index',compact('title','navCategories','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
