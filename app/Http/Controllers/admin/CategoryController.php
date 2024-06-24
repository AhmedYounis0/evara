<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\StoreCategoryRequest;
use App\Http\Requests\categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Categories';

        // Eager load the children relationship to reduce the number of queries
        $categories = Category::with('children')->whereNull('category_id')->get();

        return view('back.categories.index', compact('title', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Category';
        $categories = Category::whereNull('category_id')->get();
        return view('back.categories.create', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image'))
        {
            $image = $request->file('image');

            $newName = uniqid() . "." . $image->getClientOriginalExtension();

            $image->storeAs("public/categories", $newName);

            $data['image'] = $newName;
        }

        Category::create($data);

        return to_route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = 'Edit Category';
        $categories = Category::whereNull('category_id')->get();
        return view('back.categories.edit', compact('title','category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $newName = uniqid() . "." . $image->getClientOriginalExtension();
            $image->storeAs("public/categories", $newName);
            $data['image'] = $newName;
        }

        $category->update($data);

        return to_route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->products()->delete();
        $category->delete();

        return to_route('categories.index')->with('success', 'Category deleted successfully');
    }

    public function getSubcategories($category_id)
    {
        // Validate category_id to ensure it's a valid integer
        if (!is_numeric($category_id) || intval($category_id) <= 0) {
            return response()->json([], 400); // Return empty array with 400 status if invalid
        }

        // Find subcategories with the given category_id
        $subcategories = Category::where('category_id', $category_id)->get(['id', 'name']);

        // Return subcategories as JSON
        return response()->json(['subcategories' => $subcategories]);
    }

}
