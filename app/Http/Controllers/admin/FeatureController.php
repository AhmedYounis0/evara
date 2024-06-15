<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\features\StoreFeatureRequest;
use App\Http\Requests\features\UpdateFeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $title = "Features";
        $features = Feature::all();
        return view('back.features.index', compact('features', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $title = "Create Feature";
        return view('back.features.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');

        $newImageName = uniqid() . $image->getClientOriginalName();

        $image->storeAs( 'public/features/',$newImageName);

        $data['image'] = $newImageName;

        Feature::create($data);

        return to_route('features.index')->with('success', 'Feature created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature): view
    {
        $title = "Update Feature";
        return view('back.features.edit', compact('feature', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request,Feature $feature)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete("public/features/$feature->image");
            $image = $request->file('image');
            $newImageName = uniqid() . $image->getClientOriginalName();
            $image->storeAs( 'public/features/',$newImageName);
            $data['image'] = $newImageName;
        }
        $feature->update($data);

        return to_route('features.index')->with('success', 'Feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        Storage::delete("public/features/$feature->image");

        $feature->delete();

        return to_route('features.index')->with('success', 'Feature deleted successfully.');
    }
}
