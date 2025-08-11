<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('backend.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'category' => 'required|in:web_design,web_development',
            'url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
            $validated['image'] = $imagePath;
        }

        Portfolio::create($validated);
        return redirect()->route('backend.portfolios.index')->with('success', 'Portfolio added successfully.');
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
    public function edit(Portfolio $portfolio)
    {
        return view('backend.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'category' => 'required|in:web_design,web_development',
            'url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
            $validated['image'] = $imagePath;
        }

        $portfolio->update($validated);
        return redirect()->route('backend.portfolios.index')->with('success', 'Portfolio updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)

    {
        $portfolio->delete();
        return redirect()->route('backend.portfolios.index')->with('success', 'Portfolio deleted.');
    }
}
