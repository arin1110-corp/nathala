@extends('admin.layouts.app')

@section('title', 'Edit Kategori')
@section('page_title', 'Edit Kategori')

@section('content')

<form method="POST" action="{{ route('admin.kategori.update', $item->kategori_id) }}"
      enctype="multipart/form-data"
      class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 space-y-4">

    @csrf
    @method('PUT')

    {{-- NAMA --}}
    <div>
        <label>Nama Kategori</label>
        <input type="text" name="kategori_nama"
               value="{{ $item->kategori_nama }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    {{-- DESKRIPSI --}}
    <div>
        <label>Deskripsi</label>
        <textarea name="kategori_deskripsi"
                  class="w-full p-3 rounded-xl border border-pink-100">{{ $item->kategori_deskripsi }}</textarea>
    </div>

    {{-- THUMBNAIL --}}
    <div>
        <label>Thumbnail</label>
        <input type="file" name="kategori_thumbnail"
               class="w-full p-3 rounded-xl border border-pink-100 bg-white">

        @if($item->kategori_thumbnail)
            <img src="{{ asset($item->kategori_thumbnail) }}"
                 class="w-20 h-20 mt-2 rounded-xl object-cover">
        @endif
    </div>


    {{-- VISIBILITY --}}
    <div class="flex items-center gap-2">
        <input type="checkbox" name="kategori_is_visible" value="1"
               {{ $item->kategori_is_visible ? 'checked' : '' }}>
        <label>Visible</label>
    </div>

    {{-- SEO --}}
    <div>
        <label>Meta Title</label>
        <input type="text" name="kategori_meta_title"
               value="{{ $item->kategori_meta_title }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <div>
        <label>Meta Description</label>
        <textarea name="kategori_meta_description"
                  class="w-full p-3 rounded-xl border border-pink-100">{{ $item->kategori_meta_description }}</textarea>
    </div>

    {{-- SORT --}}
    <div>
        <label>Sort Order</label>
        <input type="number" name="kategori_sort_order"
               value="{{ $item->kategori_sort_order }}"
               class="w-full p-3 rounded-xl border border-pink-100">
    </div>

    <button class="bg-blue-500 text-white px-6 py-2 rounded-xl">
        Update
    </button>

</form>

@endsection