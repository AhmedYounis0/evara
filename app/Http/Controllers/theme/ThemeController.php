<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Slider;
use Illuminate\Http\Request;

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
        $navCategories = Category::whereNotNull('category_id')->get();
        $categories = Category::with('children')->whereNull('category_id')->get();
        $popularCategories = Category::WhereNotNull('category_id')->orderBy('category_views', 'desc')->take(8)->get();
        $brands = Brand::all()->take(8);
        return view('front.index', compact(
            'title',
            'categories',
            'navCategories',
            'sliders',
            'features',
            'popularCategories',
            'brands'
        ));
    }
}
