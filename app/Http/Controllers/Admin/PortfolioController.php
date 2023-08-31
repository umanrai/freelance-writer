<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Latest is equivalent to : rows order by descending order created_at
        $portfolios = Portfolio::latest()->paginate(15);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $d = [
//            'a' => 'sdds',
//            'b' => 'dsdssd'
//        ];
//        // object nbotaion = ->
//        dd($d['a']);
        return view('admin.portfolio.create');
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
            'title' => 'required|min:10|max:150',
            'description' => 'required|max:500',
            'url' => 'required|url',
            'image_holder' => 'required|image|mimes:jpeg,jpg,png|max:2048', // 1mb =>1024KB ie, 2MB
            'date' => 'required',
            'type' => 'required'
        ]);

        $filename = time().'.'.$request->file('image_holder')->getClientOriginalExtension();
        Storage::disk('public')->put('images'.DIRECTORY_SEPARATOR.'portfolio'.DIRECTORY_SEPARATOR.$filename, File::get($request->file('image_holder')));

        Portfolio::create($request->merge([
            'slug' => \Str::slug($request->get('title')),
            'image' => $filename,
            ])->all());
        return redirect()->route('portfolio.index')->with('success','Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio) // Route model binding
    {
//        $portfolio = Portfolio::find($id);
//
//        if (is_null($portfolio)) {
//            abort(404);
//        }

        // $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|min:10|max:150',
            'description' => 'required|max:500',
            'image_holder' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048', // 1mb =>1024KB ie, 2MB
            'url' => 'required|url',
            'date' => 'required',
            'type' => 'required'
        ]);

        if ($request->hasFile('image_holder')) {
            $filename = time().'.'.$request->file('image_holder')->getClientOriginalExtension();
            Storage::disk('public')->put('images'.DIRECTORY_SEPARATOR.'portfolio'.DIRECTORY_SEPARATOR.$filename, File::get($request->file('image_holder')));

            // We should only delete image if new image is going to be added
            $imagePath = 'images'. DIRECTORY_SEPARATOR .'portfolio'. DIRECTORY_SEPARATOR .$portfolio->image;
            if(Storage::disk('public')->has($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $portfolio->update($request->merge([
            'image' => $filename ?? $portfolio->image,
        ])->all());

        return redirect()->route('portfolio.index')->with('success','Portfolio is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $imagePath = 'images'. DIRECTORY_SEPARATOR .'portfolio'. DIRECTORY_SEPARATOR .$portfolio->image;
        if(Storage::disk('public')->has($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        $portfolio->delete();
        return back()->with('success','Portfolio is deleted successfully.');
    }
}
