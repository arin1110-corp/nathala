@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('page_title', 'Edit Product')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.product.update', $item->product_id) }}"
      enctype="multipart/form-data"
      class="space-y-5 bg-white/80 backdrop-blur-xl p-6 rounded-2xl border"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-gray-600">Nama Product</label>
        <input type="text"
               name="product_nama"
               value="{{ $item->product_nama }}"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Kategori</label>
        <select name="product_kategori"
                class="w-full p-3 border border-gray-200 rounded-xl bg-white">

            @foreach($kategori as $k)
                <option value="{{ $k->kategori_id }}"
                    {{ $item->product_kategori == $k->kategori_id ? 'selected' : '' }}>
                    {{ $k->kategori_nama }}
                </option>
            @endforeach

        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Merk</label>
        <input type="text"
               name="product_merk"
               value="{{ $item->product_merk }}"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Affiliate Link</label>
        <input type="text"
               name="product_affiliate_link"
               value="{{ $item->product_affiliate_link }}"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Harga</label>
        <input type="number"
               name="product_harga"
               value="{{ $item->product_harga }}"
               class="w-full p-3 border border-gray-200 rounded-xl">
    </div>

    <div>
        <label class="text-sm text-gray-600">Deskripsi</label>
        <textarea name="product_deskripsi"
                  rows="5"
                  class="w-full p-3 border border-gray-200 rounded-xl">{{ $item->product_deskripsi }}</textarea>
    </div>

    <div>
        <label class="text-sm text-gray-600">Thumbnail</label>
        <input type="file"
               name="product_thumbnail"
               class="w-full p-3 border border-gray-200 rounded-xl bg-white">

        @if($item->product_thumbnail)
            <img src="{{ asset($item->product_thumbnail) }}"
                 class="w-24 h-24 rounded-xl mt-3 object-cover">
        @endif
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="product_featured"
               value="1"
               {{ $item->product_featured ? 'checked' : '' }}
               style="accent-color: {{ $primary }};">
        Featured Product
    </label>

    <div>
        <label class="text-sm text-gray-600">Status</label>
        <select name="product_status"
                class="w-full p-3 border border-gray-200 rounded-xl bg-white">

            <option value="draft" {{ $item->product_status == 'draft' ? 'selected' : '' }}>
                Draft
            </option>

            <option value="active" {{ $item->product_status == 'active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="archived" {{ $item->product_status == 'archived' ? 'selected' : '' }}>
                Archived
            </option>

        </select>
    </div>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Update Product
    </button>

</form>

@endsection