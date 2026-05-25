@extends('admin.layouts.app')

@section('title', 'Settings')
@section('page_title', 'Settings')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

@if (session('success'))
    <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<form method="POST"
      action="{{ route('admin.setting.update') }}"
      enctype="multipart/form-data"
      class="bg-white/80 backdrop-blur-xl border rounded-2xl p-6 space-y-6"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <label class="text-sm text-gray-600">Site Name</label>
            <input type="text" name="site_name" value="{{ $setting->site_name }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">Tagline</label>
            <input type="text" name="site_tagline" value="{{ $setting->site_tagline }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Description</label>
            <textarea name="site_description" rows="3"
                      class="w-full p-3 rounded-xl border border-gray-200">{{ $setting->site_description }}</textarea>
        </div>

        <div>
            <label class="text-sm text-gray-600">Logo</label>
            <input type="file" name="site_logo"
                   class="w-full p-3 rounded-xl border border-gray-200 bg-white">

            @if ($setting->site_logo)
                <img src="{{ asset($setting->site_logo) }}" class="h-16 mt-3 rounded-xl object-contain">
            @endif
        </div>

        <div>
            <label class="text-sm text-gray-600">Favicon</label>
            <input type="file" name="site_favicon"
                   class="w-full p-3 rounded-xl border border-gray-200 bg-white">

            @if ($setting->site_favicon)
                <img src="{{ asset($setting->site_favicon) }}" class="w-12 h-12 mt-3 rounded-xl object-cover">
            @endif
        </div>

        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" name="site_email" value="{{ $setting->site_email }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">Phone</label>
            <input type="text" name="site_phone" value="{{ $setting->site_phone }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">WhatsApp</label>
            <input type="text" name="site_whatsapp" value="{{ $setting->site_whatsapp }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">Instagram</label>
            <input type="text" name="site_instagram" value="{{ $setting->site_instagram }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">TikTok</label>
            <input type="text" name="site_tiktok" value="{{ $setting->site_tiktok }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">YouTube</label>
            <input type="text" name="site_youtube" value="{{ $setting->site_youtube }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">Facebook</label>
            <input type="text" name="site_facebook" value="{{ $setting->site_facebook }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">Meta Title</label>
            <input type="text" name="site_meta_title" value="{{ $setting->site_meta_title }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Meta Description</label>
            <textarea name="site_meta_description" rows="3"
                      class="w-full p-3 rounded-xl border border-gray-200">{{ $setting->site_meta_description }}</textarea>
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Google Analytics Script</label>
            <textarea name="site_google_analytics" rows="4"
                      class="w-full p-3 rounded-xl border border-gray-200">{{ $setting->site_google_analytics }}</textarea>
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Meta Pixel Script</label>
            <textarea name="site_meta_pixel" rows="4"
                      class="w-full p-3 rounded-xl border border-gray-200">{{ $setting->site_meta_pixel }}</textarea>
        </div>

        <div class="md:col-span-2">
            <h3 class="text-lg font-bold text-slate-800 border-t border-gray-200 pt-6">
                Theme Color
            </h3>
        </div>

        <div>
            <label class="text-sm text-gray-600">Primary Color</label>
            <input type="color" name="theme_primary" value="{{ $setting->theme_primary ?? '#ec4899' }}"
                   class="w-full h-12 rounded-xl border border-gray-200 bg-white">
        </div>

        <div>
            <label class="text-sm text-gray-600">Secondary Background</label>
            <input type="color" name="theme_secondary" value="{{ $setting->theme_secondary ?? '#fdf2f8' }}"
                   class="w-full h-12 rounded-xl border border-gray-200 bg-white">
        </div>

        <div>
            <label class="text-sm text-gray-600">Accent Color</label>
            <input type="color" name="theme_accent" value="{{ $setting->theme_accent ?? '#f43f5e' }}"
                   class="w-full h-12 rounded-xl border border-gray-200 bg-white">
        </div>

        <div>
            <label class="text-sm text-gray-600">Text Color</label>
            <input type="color" name="theme_text" value="{{ $setting->theme_text ?? '#1e293b' }}"
                   class="w-full h-12 rounded-xl border border-gray-200 bg-white">
        </div>

        <div>
            <label class="text-sm text-gray-600">Footer Color</label>
            <input type="color" name="theme_footer" value="{{ $setting->theme_footer ?? '#ffffff' }}"
                   class="w-full h-12 rounded-xl border border-gray-200 bg-white">
        </div>

    </div>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Simpan Setting
    </button>
</form>

@endsection