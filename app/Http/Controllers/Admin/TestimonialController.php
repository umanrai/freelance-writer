<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name' => 'required|min:5|max:50',
            'designation' => 'required|max:50',
            'statement' => 'required|min:50|max:500',
            'image_holder' => 'required|image|mimes:jpeg,jpg,png|max:2048', // 1mb =>1024KB ie, 2MB
        ]);

        $filename = time().'.'.$request->file('image_holder')->getClientOriginalExtension();
        Storage::disk('public')->put('images'.DIRECTORY_SEPARATOR.'testimonial'.DIRECTORY_SEPARATOR.$filename, File::get($request->file('image_holder')));

        Testimonial::create($request->merge([
            'image' => $filename,
        ])->all());
        return redirect()->route('testimonial.index')->with('success','Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
            'designation' => 'required|max:50',
            'statement' => 'required|min:50|max:500',
            'image_holder' => 'required|image|mimes:jpeg,jpg,png|max:2048', // 1mb =>1024KB ie, 2MB
        ]);

        if ($request->hasFile('image_holder')) {
            $filename = time().'.'.$request->file('image_holder')->getClientOriginalExtension();
            Storage::disk('public')->put('images'.DIRECTORY_SEPARATOR.'testimonial'.DIRECTORY_SEPARATOR.$filename, File::get($request->file('image_holder')));

            // We should only delete image if new image is going to be added
            $imagePath = 'images'. DIRECTORY_SEPARATOR .'testimonial'. DIRECTORY_SEPARATOR .$testimonial->image;
            if(Storage::disk('public')->has($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $testimonial->update($request->merge([
            'image' => $filename ?? $testimonial->image,
        ])->all());

        return redirect()->route('testimonial.index')->with('success','Testimonial Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $imagePath = 'images'. DIRECTORY_SEPARATOR .'testimonial'. DIRECTORY_SEPARATOR .$testimonial->image;
        if(Storage::disk('public')->has($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        $testimonial->delete();
        return back()->with('success','Testimonial is deleted successfully.');
    }
}
