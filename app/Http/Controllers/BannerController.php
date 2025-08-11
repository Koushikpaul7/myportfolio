<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'desgOne' => 'required',
            'desgTwo' => 'required',
            'desgThree' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        // store image
        $imagePath = $request->file('image')->store('banners', 'public');
        $data['image'] = $imagePath;

        Banner::create($data);
        return redirect()->route('backend.banner.index')->with('success', 'Banner created');
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
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
    $data = $request->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'desgOne' => 'required',
        'desgTwo' => 'required',
        'desgThree' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('banners', 'public');
        $data['image'] = $imagePath;
    }

    $banner->update($data);
    return redirect()->route('backend.banner.index')->with('success', 'Banner updated');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('backend.banner.index')->with('success', 'Banner deleted.');
    }
}
