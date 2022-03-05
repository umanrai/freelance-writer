<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $faqs = Faq::latest()->limit(5)->get();
        return view('frontend.index', compact('faqs'));
    }

    public function test()
    {
        return view('index-2');
    }
}
