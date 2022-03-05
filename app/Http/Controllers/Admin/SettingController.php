<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function edit()
    {
        $setting = Setting::pluck('value', 'key');

        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        foreach($request->except('_token') as $key => $value)
        {

            if ($setting = Setting::where('key', $key)->first()) {

                // update the key value, if key is found
                $setting->update([
                    'value' => $value,
                ]);
            } else {
                // else create new
                Setting::create([
                    'key' => $key,
                    'value' => $value
                ]);
            }

        }

        return back()->with('success','Setting is updated successfully.');
    }

}
