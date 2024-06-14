<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\brand\StoreBrandRequest;
use App\Http\Requests\brand\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Brands";
        $brands = Brand::all();
        return view('back.brands.index', compact('title','brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Brand";
        return view('back.brands.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');

        $newImageName = uniqid() . $image->getClientOriginalName();

        $image->storeAs('public/brands', $newImageName);

        $data['image'] = $newImageName;

        Brand::create($data);

        return to_route('brands.index')->with('success','Brand is created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $title = 'Update Brand';
        return view('back.brands.edit',compact('title','brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete("public/brands/$brand->image");
            $image = $request->file('image');
            $newImageName = uniqid() . $image->getClientOriginalName();
            $image->storeAs('public/brands', $newImageName);
            $data['image'] = $newImageName;
        }
        $brand->update($data);
        return to_route('brands.index')->with('success','Brand is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Storage::delete("public/brands/$brand->image");

        $brand->delete();

        return to_route('brands.index')->with('success','Brand is deleted successfully');

    }
}
