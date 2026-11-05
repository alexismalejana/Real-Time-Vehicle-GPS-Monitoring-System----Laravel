<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(){
        $data['getSetting'] = Setting::getSetting(1);
        return view('admin.setting.setting',$data);
    }

    public function update_setting(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'app_name' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'release_date' => 'required',
            'developer' => 'required|string|max:255',
            'api' => 'required|string|max:255',
        ]);

        $setting = Setting::getSetting();


        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $ext = $file->getClientOriginalExtension();

            $randomStr = $request->id . Str::random(20);

            $filename = strtolower($randomStr) . '.' . $ext;

            $uploadPath = public_path('uploads/setting');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);

            $setting->logo = $filename;
        }


        if ($request->hasFile('favicon')) {

            $file = $request->file('favicon');

            $ext = $file->getClientOriginalExtension();

            $randomStr = $request->id . Str::random(20);

            $filename = strtolower($randomStr) . '.' . $ext;

            $uploadPath = public_path('uploads/setting');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);

            $setting->favicon = $filename;
        }

        if ($request->hasFile('bg_image')) {

            $file = $request->file('bg_image');

            $ext = $file->getClientOriginalExtension();

            $randomStr = $request->id . Str::random(20);

            $filename = strtolower($randomStr) . '.' . $ext;

            $uploadPath = public_path('uploads/bg');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);

            $setting->bg_image = $filename;
        }
        
        
        $setting->app_name = $request->app_name;
        $setting->website = $request->website;
        $setting->release_date = $request->release_date;
        $setting->developer = $request->developer;
        $setting->api = $request->api;
        $setting->save();

        return redirect()->route('admin.setting.setting')->with('success', 'System updated successfully!');
    }
}
