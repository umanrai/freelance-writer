<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function edit()
    {
        return view('admin.setting.edit');
    }

    public function update(Request $request, Setting $setting)
    {
        //
    }

}
