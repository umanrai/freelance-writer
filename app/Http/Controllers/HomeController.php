<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Feature;
use App\Portfolio;
use App\Service;
use App\Setting;
use App\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //select * from `faqs` order by `created_at` desc limit 5
        $faqs = Faq::latest()->limit(5)->get();

        //select * from `testimonials` order by `created_at` desc limit 5
        $testimonials = Testimonial::latest()->limit(5)->get();

        $portfolios = Portfolio::latest()->limit(10)->get();

        $features = Feature::latest()->limit(4)->get();

        $services = Service::latest()->limit(6)->get();

        $setting = Setting::pluck('value', 'key');

        return view('frontend.index', compact( 'faqs','testimonials', 'portfolios', 'features', 'services', 'setting'));
    }

}
