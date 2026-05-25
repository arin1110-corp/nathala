@extends('admin.layouts.app')

@section('title', 'Edit Page')
@section('page_title', 'Edit Page')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.page.update', $item->page_id) }}"
      enctype="multipart/form-data"
      class="bg-white/80 backdrop-blur-xl border rounded-2xl p-6 space-y-5"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-gray-600">Judul Page</label>
        <input type="text"
               name="page_judul"
               value="{{ $item->page_judul }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Content</label>
        <textarea name="page_content"
                  rows="8"
                  class="w-full p-3 rounded-xl border border-gray-200">{{ $item->page_content }}</textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Thumbnail</label>
        <input type="file"
               name="page_thumbnail"
               class="w-full p-3 rounded-xl border border-gray-200 bg-white">

        @if($item->page_thumbnail)
            <img src="{{ asset($item->page_thumbnail) }}"
                 class="w-32 h-20 rounded-xl object-cover mt-3">
        @endif
    </div>

    <div>
        <label class="text-sm text-gray-600">Meta Title</label>
        <input type="text"
               name="page_meta_title"
               value="{{ $item->page_meta_title }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Meta Description</label>
        <textarea name="page_meta_description"
                  rows="3"
                  class="w-full p-3 rounded-xl border border-gray-200">{{ $item->page_meta_description }}</textarea>
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="page_is_active"
               value="1"
               {{ $item->page_is_active ? 'checked' : '' }}
               style="accent-color: {{ $primary }};">
        <span>Active</span>
    </label>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Update Page
    </button>

</form>

@endsection