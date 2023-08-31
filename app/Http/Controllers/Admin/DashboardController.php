<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{

   public function index(Request $request)
   {
       $data['total-users']    = User::count();
       $data['total-writers']  = User::count();
       $data['total-clients']  = User::count();
       $data['total-articles'] = Article::count();
       $data['total-tags']     = Tag::count();
       $data['total-categories'] = Category::count();
       $data['total-articles-given-by-me'] = Article::where('client_id', auth()->id())->count();
       $data['total-articles-draft'] = Article::where('writer_id', auth()->id())->where('is_completed_by_writer', 0)->count();
       $data['total-articles-publised'] = Article::where('writer_id', auth()->id())->where('is_completed_by_writer', 1)->count();
       $data['total-earned'] = Article::where('writer_id', auth()->id())->where('is_completed_by_writer', 1)->sum('wages');

        return view('admin.dashboard')->with('data', $data);
   }

}

