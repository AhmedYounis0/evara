<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sliders\StoreSliderRequest;
use App\Http\Requests\sliders\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Slider';
        $sliders = Slider::all();
        return view('back.slider.index', compact('title', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Slider';
        return view('back.slider.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');

        $newImageName = uniqid() . "." . $image->getClientOriginalExtension();

        $image->storeAs('public/sliders', $newImageName);

        $data['image'] = $newImageName;

        Slider::create($data);

        return to_route('sliders.index')->with('success', 'Slider has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $title = 'Update Slider';
        return view('back.slider.edit', compact('title', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request,Slider $slider)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete("public/sliders/$slider->image");
            $image = $request->file('image');
            $newImageName = uniqid() . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/sliders', $newImageName);
            $data['image'] = $newImageName;
        }
        $slider->update($data);

        return to_route('sliders.index')->with('success', 'Slider has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        Storage::delete("public/sliders/$slider->image");

        $slider->delete();

        return to_route('sliders.index')->with('success', 'Slider deleted successfully');
    }
}
