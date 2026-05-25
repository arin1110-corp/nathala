@extends('admin.layouts.app')

@section('title', 'Tambah Slider')
@section('page_title', 'Tambah Slider')

@section('content')

<form method="POST"
      action="{{ route('admin.slider.store') }}"
      enctype="multipart/form-data"
      class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 space-y-4">

    @csrf

    <div>
        <label class="text-sm text-gray-600">Nama Internal</label>
        <input type="text" name="slider_nama"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Judul</label>
        <input type="text" name="slider_judul"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Deskripsi</label>
        <textarea name="slider_deskripsi"
                  class="w-full p-3 rounded-xl border border-pink-100"></textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Image Utama</label>
        <input type="file" name="slider_image"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Image Mobile</label>
        <input type="file" name="slider_image_mobile"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white">
    </div>

    <div>
        <label class="text-sm text-gray-600">Link CTA</label>
        <input type="text" name="slider_link"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Button Text</label>
        <input type="text" name="slider_button_text"
               placeholder="Lihat Produk"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Posisi</label>
        <select name="slider_posisi"
                class="w-full p-3 rounded-xl border border-pink-100">
            <option value="home">Home</option>
            <option value="promo">Promo</option>
            <option value="kategori">Kategori</option>
        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Sort Order</label>
        <input type="number" name="slider_sort_order" value="0"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Alt Text</label>
        <input type="text" name="slider_alt_text"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label class="text-sm text-gray-600">Tipe</label>
        <select name="slider_tipe"
                class="w-full p-3 rounded-xl border border-pink-100">
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Video URL</label>
        <input type="text" name="slider_video_url"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-gray-600">Mulai Tayang</label>
            <input type="datetime-local" name="slider_mulai"
                   class="w-full p-3 rounded-xl border border-pink-100">
        </div>

        <div>
            <label class="text-sm text-gray-600">Selesai Tayang</label>
            <input type="datetime-local" name="slider_selesai"
                   class="w-full p-3 rounded-xl border border-pink-100">
        </div>
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="slider_is_active" value="1" checked>
        <span>Aktif</span>
    </label>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Simpan
    </button>
</form>

@endsection