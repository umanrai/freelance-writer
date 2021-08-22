<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TagController extends BaseController
{

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact("tags"));
    }
    public function create()
    {

        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([

            'title' => 'required',

            'body' => 'required',

        ]);

        Tag::create($request->all());

        return redirect()->route('tag.index')->with('success','Tag created successfully.');

    }

    public function show(Tag $tag)
    {
        //
        return view('admin.tag.show',compact('tag'));
    }

    public function edit(Tag $tag)
    {
        //
        return view('admin.tag.edit',compact('tag'));
    }

    public function update(Tag $tag, Request $request)
    {
        $data = $request->all();
        $tag->update($data);

        return back();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with('success','Tag deleted successfully');
    }
}
