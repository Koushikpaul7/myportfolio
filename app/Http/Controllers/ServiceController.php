<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index() {
        $services = Service::all();
        return view('backend.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $data['image'] = $request->file('image')->store('services', 'public');
        Service::create($data);

        return redirect()->route('backend.service.index')->with('success', 'Service created.');
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
    public function edit(Service $service)
    {
         return view('backend.service.edit',['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);
        return redirect()->route('backend.service.index')->with('success', 'Service updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('backend.service.index')->with('success', 'Service deleted.');
    }
}
