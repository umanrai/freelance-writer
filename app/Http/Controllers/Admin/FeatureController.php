<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::latest()->paginate(15);
        return view('admin.feature.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required|min:3|max:100|unique:features,title',
            'summary' => 'required|min:10|max:150',
            'description' => 'required|max:500',

        ]);


        Feature::create($request->merge([
            'slug' => \Str::slug($request->get('title')),
        ])->all());
        return redirect()->route('feature.index')->with('success','Feature created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        return view('admin.feature.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required|min:3|max:100|unique:features,title',
            'summary' => 'required|min:10|max:150',
            'description' => 'required|max:500',

        ]);

        $feature->update($request->all());

        return redirect()->route('feature.index')->with('success','Feature is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('feature.index')->with('success','Feature deleted successfully');
    }
}
