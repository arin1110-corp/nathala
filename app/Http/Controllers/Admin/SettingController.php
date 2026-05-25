<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = ModelSetting::first();

        if (!$setting) {
            $setting = ModelSetting::create([]);
        }

        return view('admin.setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = ModelSetting::first();

        if (!$setting) {
            $setting = ModelSetting::create([]);
        }

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '_logo_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/setting'), $filename);
            $setting->site_logo = 'uploads/setting/' . $filename;
        }

        if ($request->hasFile('site_favicon')) {
            $file = $request->file('site_favicon');
            $filename = time() . '_favicon_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/setting'), $filename);
            $setting->site_favicon = 'uploads/setting/' . $filename;
        }

        $setting->update([
            'site_name' => $request->site_name,
            'site_tagline' => $request->site_tagline,
            'site_description' => $request->site_description,
            'site_email' => $request->site_email,
            'site_phone' => $request->site_phone,
            'site_whatsapp' => $request->site_whatsapp,
            'site_instagram' => $request->site_instagram,
            'site_tiktok' => $request->site_tiktok,
            'site_youtube' => $request->site_youtube,
            'site_facebook' => $request->site_facebook,
            'site_meta_title' => $request->site_meta_title,
            'site_meta_description' => $request->site_meta_description,
            'site_google_analytics' => $request->site_google_analytics,
            'site_meta_pixel' => $request->site_meta_pixel,
            'theme_primary' => $request->theme_primary,
            'theme_secondary' => $request->theme_secondary,
            'theme_accent' => $request->theme_accent,
            'theme_text' => $request->theme_text,
            'theme_footer' => $request->theme_footer,
        ]);

        return redirect()->route('admin.setting.index')
            ->with('success', 'Setting berhasil diupdate');
    }
}