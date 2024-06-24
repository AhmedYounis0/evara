<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVisitor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(String $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $visitorCreated = ProductVisitor::firstOrCreate([
           'product_id' => $product->id,
           'ip' => request()->ip(),
        ]);
        if ($visitorCreated->wasRecentlyCreated)
        {
            $product->increment('count');
        }
        return "Hello";
    }
}
