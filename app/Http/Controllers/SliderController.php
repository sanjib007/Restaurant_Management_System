<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->get();
        return view('pages.secure.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $destinationPath = public_path('assets/img/slider');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $imageFile = $request->file('image');
        $imageName = time()."-".preg_replace('/\s+/', '_', $imageFile->getClientOriginalName());
        $imageFile->move($destinationPath, $imageName);

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imageName,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('slider.index')->withSuccess('Slider item added successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('pages.secure.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->file('image')) {
            $imageName = time()."-".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/img/slider'), $imageName);
            $slider->image = $imageName;
        }

        $slider->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('slider.index')->withSuccess('Slider item updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->route('slider.index')->withSuccess('Slider item deleted successfully.');
    }
}
