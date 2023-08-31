<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Misc\Role;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $articles = Article::with('client')
            ->when(auth()->user()->role_id !== \App\Misc\Role::ROLE_ADMIN, function ($query) {

                if (auth()->user()->isWriter()) {
                    $query->where( 'writer_id', auth()->id() );
                } else {
                    $query->where( 'client_id', auth()->id() );
                }
            })
            ->when(!is_null($request->get('is_completed_by_writer')), function ($query) {
                $query->where('is_completed_by_writer', '=', request('is_completed_by_writer'));
            })
            ->latest()
            ->paginate(5);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get([ 'name', 'id' ]);
        $data['tags'] = Tag::get([ 'title as name', 'id' ]);
        return view('admin.article.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        Article::create($data);
        return redirect()->route('article.index')->with('success','Article created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $data['categories'] = Category::get([ 'name', 'id' ]);
        $data['tags'] = Tag::get([ 'title as name', 'id' ]);
        $data['writers'] = User::where('role_id', '=', Role::ROLE_WRITER)->pluck('first_name', 'id');
        return view('admin.article.edit', compact('article', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */

    public function update(Article $article, UpdateRequest $request)
    {
        $data = $request->all();
        $article->update(array_filter($data));
        return redirect()->route('article.index')->with('success','Article update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success','Article deleted successfully');
    }
}
