@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.kategori.store') }}"
      enctype="multipart/form-data"
      class="bg-white/80 backdrop-blur-xl p-6 rounded-3xl border shadow-sm space-y-5"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf

    {{-- NAMA --}}
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-2">
            Nama Kategori
        </label>
        <input type="text"
               name="kategori_nama"
               required
               class="w-full p-3 rounded-2xl border focus:outline-none focus:ring-2"
               style="border-color: color-mix(in srgb, {{ $primary }} 15%, white); focus-ring-color: {{ $primary }};">
    </div>

    {{-- DESKRIPSI --}}
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-2">
            Deskripsi
        </label>
        <textarea name="kategori_deskripsi"
                  rows="4"
                  class="w-full p-3 rounded-2xl border focus:outline-none"
                  style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);"></textarea>
    </div>

    {{-- THUMBNAIL --}}
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-2">
            Thumbnail
        </label>
        <input type="file"
               name="kategori_thumbnail"
               class="w-full p-3 rounded-2xl border bg-white"
               style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">
    </div>

    {{-- VISIBILITY --}}
    <div class="flex items-center gap-3 p-4 rounded-2xl"
         style="background: color-mix(in srgb, {{ $primary }} 6%, white);">

        <input type="checkbox"
               name="kategori_is_visible"
               value="1"
               checked
               class="w-5 h-5"
               style="accent-color: {{ $primary }};">

        <label class="text-sm font-medium text-gray-700">
            Visible
        </label>
    </div>

    {{-- SEO --}}
    <div class="pt-4 border-t"
         style="border-color: color-mix(in srgb, {{ $primary }} 10%, white);">
        <h3 class="text-lg font-bold mb-4"
            style="color: {{ $primary }};">
            SEO Setting
        </h3>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Meta Title
                </label>
                <input type="text"
                       name="kategori_meta_title"
                       class="w-full p-3 rounded-2xl border"
                       style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Meta Description
                </label>
                <textarea name="kategori_meta_description"
                          rows="3"
                          class="w-full p-3 rounded-2xl border"
                          style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);"></textarea>
            </div>
        </div>
    </div>

    {{-- SORT --}}
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-2">
            Sort Order
        </label>
        <input type="number"
               name="kategori_sort_order"
               value="0"
               class="w-full p-3 rounded-2xl border"
               style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">
    </div>

    {{-- BUTTON --}}
    <div class="pt-4">
        <button class="text-white px-6 py-3 rounded-2xl font-medium shadow hover:opacity-90 transition"
                style="background: {{ $primary }};">
            Simpan Kategori
        </button>
    </div>

</form>

@endsection