<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('user')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->all();

        Category::create($data);
        return back();
    }

    public function edit(Category $category)
    {
        // Route Model Binding
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category, UpdateRequest $request)
    {

        $data = $request->all();

        $category->update(array_filter($data));

        return back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }
}
