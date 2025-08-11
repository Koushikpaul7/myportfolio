<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index() {
        $abouts = About::all();
        return view('backend.abouts.index', ['abouts' => $abouts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('backend.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
             'name' => 'required',
        'designation' => 'required',
        'brief' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png',
        'web_design_percent' => 'required|integer|min:0|max:100',
        'development_percent' => 'required|integer|min:0|max:100',
        'branding_percent' => 'required|integer|min:0|max:100',
        'facebook' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'github' => 'nullable|url',
        ]);

        $data['image'] = $request->file('image')->store('abouts', 'public');
        About::create($data);

        return redirect()->route('backend.abouts.index')->with('success', 'about created.');
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
    public function edit(about $about)
    {
         return view('backend.abouts.edit',['about'=>$about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about) {
        $data = $request->validate([
           'name' => 'required',
        'designation' => 'required',
        'brief' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'web_design_percent' => 'required|integer|min:0|max:100',
        'development_percent' => 'required|integer|min:0|max:100',
        'branding_percent' => 'required|integer|min:0|max:100',
        'facebook' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'github' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('abouts', 'public');
        }

        $about->update($data);
        return redirect()->route('backend.abouts.index')->with('success', 'about updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(About $about) {
        $about->delete();
        return redirect()->route('backend.abouts.index')->with('success', 'about deleted.');
    }
}