<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductVisitor;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;

class ThemeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Home';
        $features = Feature::all();
        $sliders  = Slider::all();
        $navCategories = Category::whereNull('category_id')->get();
        $megaCategories = Category::with('children')->whereNull('category_id')->whereHas('children')->get();
        $categories = Category::with('children')->whereNull('category_id')->doesntHave('children')->get();
        $popularCategories = Category::WhereNotNull('category_id')->orderBy('category_views', 'desc')->take(8)->get();
        $brands = Brand::all()->take(8);
        $featuredProducts = Product::Featured()->take(8)->get();
        $popularProducts = Product::withCount('visitors')->orderByDesc('visitors_count')->take(8)->get();
        $newProducts    = Product::orderByDesc('created_at')->take(8)->get();
        return view('front.index', compact(
            'title',
            'megaCategories',
            'navCategories',
            'categories',
            'sliders',
            'features',
            'popularCategories',
            'brands',
            'featuredProducts',
            'popularProducts',
            'newProducts'
        ));
    }
}
