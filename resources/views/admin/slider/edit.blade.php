@extends('admin.layouts.app')

@section('title', 'Edit Slider')
@section('page_title', 'Edit Slider')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.slider.update', $item->slider_id) }}"
      enctype="multipart/form-data"
      class="bg-white/80 backdrop-blur-xl p-6 rounded-2xl border space-y-4"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-gray-600">Nama Internal</label>
        <input type="text"
               name="slider_nama"
               value="{{ $item->slider_nama }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Judul</label>
        <input type="text"
               name="slider_judul"
               value="{{ $item->slider_judul }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Deskripsi</label>
        <textarea name="slider_deskripsi"
                  rows="4"
                  class="w-full p-3 rounded-xl border border-gray-200">{{ $item->slider_deskripsi }}</textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Image Utama</label>
        <input type="file"
               name="slider_image"
               class="w-full p-3 rounded-xl border border-gray-200 bg-white">

        @if($item->slider_image)
            <img src="{{ asset($item->slider_image) }}"
                 class="w-40 h-24 rounded-xl object-cover mt-3">
        @endif
    </div>

    <div>
        <label class="text-sm text-gray-600">Alt Text</label>
        <input type="text"
               name="slider_alt_text"
               value="{{ $item->slider_alt_text }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Link CTA</label>
        <input type="text"
               name="slider_link"
               value="{{ $item->slider_link }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Button Text</label>
        <input type="text"
               name="slider_button_text"
               value="{{ $item->slider_button_text }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Sort Order</label>
        <input type="number"
               name="slider_sort_order"
               value="{{ $item->slider_sort_order }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div>
            <label class="text-sm text-gray-600">Mulai Tayang</label>
            <input type="datetime-local"
                   name="slider_mulai"
                   value="{{ $item->slider_mulai ? \Carbon\Carbon::parse($item->slider_mulai)->format('Y-m-d\TH:i') : '' }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

        <div>
            <label class="text-sm text-gray-600">Selesai Tayang</label>
            <input type="datetime-local"
                   name="slider_selesai"
                   value="{{ $item->slider_selesai ? \Carbon\Carbon::parse($item->slider_selesai)->format('Y-m-d\TH:i') : '' }}"
                   class="w-full p-3 rounded-xl border border-gray-200">
        </div>

    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="slider_is_active"
               value="1"
               {{ $item->slider_is_active ? 'checked' : '' }}
               style="accent-color: {{ $primary }};">
        <span>Aktif</span>
    </label>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Update Slider
    </button>

</form>

@endsection