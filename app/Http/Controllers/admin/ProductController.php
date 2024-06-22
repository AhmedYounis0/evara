<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\StoreProductRequest;
use App\Http\Requests\products\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVisitor;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use function Sodium\increment;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Products";
        $products = Product::with(['category','brand'])->paginate(15);
        $categories = Category::whereNotNull('category_id')->get();
        return view('back.products.index', compact('products', 'title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Product";
        $brands = Brand::all();
        $categories = Category::whereNull('category_id')->get();
        $tags = Tag::all();
        return view('back.products.create', compact('title', 'brands', 'categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        $product = Product::create(Arr::except($data, ['tags','images'])); // Use Arr::except to exclude tags

        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $product->tags()->attach($tags); // Attach the tags
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/products', $imageName);
                $product->images()->create(['path' => $imageName]);
            }
        }

        return to_route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
//        $visitorCreated = ProductVisitor::firstOrCreate([
//           'product_id' => $product->id,
//           'ip' => request()->ip(),
//        ]);
//        if ($visitorCreated->wasRecentlyCreated)
//        {
//            $product->increment('count');
//        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $title = "Edit Product";
        $product->load('category','brand','tags');
        $brands = Brand::all();
        $categories = Category::whereNull('category_id')->get();
        $tags = Tag::all();
        return view('back.products.edit', compact('title','product','brands','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete("public/products/$product->image");
            $image = $request->file('image');
            $imageName = uniqid() . "." .$image->getClientOriginalExtension();
            $image->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);
        if ($request->filled('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->sync([]);
        }
        return to_route('products.index')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete("public/products/$product->image");

        $product->delete();

        return to_route('products.index')->with('success', 'Product deleted successfully.');
    }
}
