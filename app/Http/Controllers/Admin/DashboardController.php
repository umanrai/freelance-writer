<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{

   public function index(Request $request)
   {
//    dd($request->all(), $request->get('name'));
        return view('admin.dashboard');
   }

}
