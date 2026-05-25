@extends('admin.layouts.app')

@section('title', 'Tambah Product')
@section('page_title', 'Tambah Product')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.product.store') }}"
      enctype="multipart/form-data"
      class="space-y-5 bg-white/80 backdrop-blur-xl p-6 rounded-2xl border"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf

    <div>
        <label class="text-sm text-gray-600">Nama Product</label>
        <input type="text"
               name="product_nama"
               placeholder="Nama Product"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Kategori</label>
        <select name="product_kategori"
                class="w-full p-3 border border-gray-200 rounded-xl bg-white">

            <option value="">Pilih Kategori</option>

            @foreach($kategori as $k)
                <option value="{{ $k->kategori_id }}">
                    {{ $k->kategori_nama }}
                </option>
            @endforeach

        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Merk</label>
        <input type="text"
               name="product_merk"
               placeholder="Merk"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Affiliate Link</label>
        <input type="text"
               name="product_affiliate_link"
               placeholder="https://..."
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Harga</label>
        <input type="number"
               name="product_harga"
               placeholder="Harga"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Deskripsi</label>
        <textarea name="product_deskripsi"
                  rows="5"
                  placeholder="Deskripsi Product"
                  class="w-full p-3 border border-gray-200 rounded-xl"></textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Thumbnail</label>
        <input type="file"
               name="product_thumbnail"
               class="w-full p-3 border border-gray-200 rounded-xl bg-white">
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="product_featured"
               value="1"
               style="accent-color: {{ $primary }};">
        Featured Product
    </label>

    <div>
        <label class="text-sm text-gray-600">Status</label>
        <select name="product_status"
                class="w-full p-3 border border-gray-200 rounded-xl bg-white">
            <option value="draft">Draft</option>
            <option value="active">Active</option>
            <option value="archived">Archived</option>
        </select>
    </div>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Simpan Product
    </button>

</form>

@endsection