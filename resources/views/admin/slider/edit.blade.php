@extends('admin.layouts.app')

@section('title', 'Edit Slider')
@section('page_title', 'Edit Slider')

@section('content')

<form method="POST"
      action="{{ route('admin.slider.update', $item->slider_id) }}"
      enctype="multipart/form-data"
      class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 space-y-4">

    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-gray-600">Nama Internal</label>
        <input type="text" name="slider_nama"
               value="{{ $item->slider_nama }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Judul</label>
        <input type="text" name="slider_judul"
               value="{{ $item->slider_judul }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Deskripsi</label>
        <textarea name="slider_deskripsi"
                  class="w-full p-3 rounded-xl border border-pink-100">{{ $item->slider_deskripsi }}</textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Image Utama</label>
        <input type="file" name="slider_image"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white">

        @if($item->slider_image)
            <img src="{{ asset($item->slider_image) }}"
                 class="w-40 h-24 rounded-xl object-cover mt-3">
        @endif
    </div>

    <div>
        <label class="text-sm text-gray-600">Image Mobile</label>
        <input type="file" name="slider_image_mobile"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white">

        @if($item->slider_image_mobile)
            <img src="{{ asset($item->slider_image_mobile) }}"
                 class="w-28 h-24 rounded-xl object-cover mt-3">
        @endif
    </div>

    <div>
        <label class="text-sm text-gray-600">Link CTA</label>
        <input type="text" name="slider_link"
               value="{{ $item->slider_link }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Button Text</label>
        <input type="text" name="slider_button_text"
               value="{{ $item->slider_button_text }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Posisi</label>
        <select name="slider_posisi"
                class="w-full p-3 rounded-xl border border-pink-100">
            <option value="home" {{ $item->slider_posisi == 'home' ? 'selected' : '' }}>Home</option>
            <option value="promo" {{ $item->slider_posisi == 'promo' ? 'selected' : '' }}>Promo</option>
            <option value="kategori" {{ $item->slider_posisi == 'kategori' ? 'selected' : '' }}>Kategori</option>
        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Sort Order</label>
        <input type="number" name="slider_sort_order"
               value="{{ $item->slider_sort_order }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Alt Text</label>
        <input type="text" name="slider_alt_text"
               value="{{ $item->slider_alt_text }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Tipe</label>
        <select name="slider_tipe"
                class="w-full p-3 rounded-xl border border-pink-100">
            <option value="image" {{ $item->slider_tipe == 'image' ? 'selected' : '' }}>Image</option>
            <option value="video" {{ $item->slider_tipe == 'video' ? 'selected' : '' }}>Video</option>
        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Video URL</label>
        <input type="text" name="slider_video_url"
               value="{{ $item->slider_video_url }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-gray-600">Mulai Tayang</label>
            <input type="datetime-local" name="slider_mulai"
                   value="{{ $item->slider_mulai ? $item->slider_mulai->format('Y-m-d\TH:i') : '' }}"
                   class="w-full p-3 rounded-xl border border-pink-100">
        </div>

        <div>
            <label class="text-sm text-gray-600">Selesai Tayang</label>
            <input type="datetime-local" name="slider_selesai"
                   value="{{ $item->slider_selesai ? $item->slider_selesai->format('Y-m-d\TH:i') : '' }}"
                   class="w-full p-3 rounded-xl border border-pink-100">
        </div>
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="slider_is_active" value="1"
               {{ $item->slider_is_active ? 'checked' : '' }}>
        <span>Aktif</span>
    </label>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Update
    </button>
</form>

@endsection