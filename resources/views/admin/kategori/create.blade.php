@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori')

@section('content')

<form method="POST" action="{{ route('admin.kategori.store') }}"
      enctype="multipart/form-data"
      class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 space-y-4">

    @csrf

    {{-- NAMA --}}
    <div>
        <label>Nama Kategori</label>
        <input type="text" name="kategori_nama"
               class="w-full p-3 rounded-xl border border-pink-100"
               required>
    </div>

    {{-- DESKRIPSI --}}
    <div>
        <label>Deskripsi</label>
        <textarea name="kategori_deskripsi"
                  class="w-full p-3 rounded-xl border border-pink-100"></textarea>
    </div>

    {{-- THUMBNAIL --}}
    <div>
        <label>Thumbnail</label>
        <input type="file" name="kategori_thumbnail"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white">
    </div>


    {{-- VISIBILITY --}}
    <div class="flex items-center gap-2">
        <input type="checkbox" name="kategori_is_visible" value="1" checked>
        <label>Visible</label>
    </div>

    {{-- SEO --}}
    <div>
        <label>Meta Title</label>
        <input type="text" name="kategori_meta_title"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label>Meta Description</label>
        <textarea name="kategori_meta_description"
                  class="w-full p-3 rounded-xl border border-pink-100"></textarea>
    </div>

    {{-- SORT --}}
    <div>
        <label>Sort Order</label>
        <input type="number" name="kategori_sort_order"
               class="w-full p-3 rounded-xl border border-pink-100"
               value="0">
    </div>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Simpan
    </button>

</form>

@endsection