@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Product</h1>

<form method="POST"
      action="{{ route('admin.product.update', $item->product_id) }}"
      enctype="multipart/form-data"
      class="space-y-4 bg-white/70 p-6 rounded-2xl border border-pink-100">

    @csrf
    @method('PUT')

    <input type="text" name="product_nama"
           value="{{ $item->product_nama }}"
           class="w-full p-3 border rounded-xl">

    <select name="product_kategori"
            class="w-full p-3 border rounded-xl">

        @foreach($kategori as $k)
            <option value="{{ $k->kategori_id }}"
                {{ $item->product_kategori == $k->kategori_id ? 'selected' : '' }}>
                {{ $k->kategori_nama }}
            </option>
        @endforeach

    </select>

    <input type="text" name="product_merk"
           value="{{ $item->product_merk }}"
           class="w-full p-3 border rounded-xl">

    <input type="text" name="product_affiliate_link"
           value="{{ $item->product_affiliate_link }}"
           class="w-full p-3 border rounded-xl">

    <input type="number" name="product_harga"
           value="{{ $item->product_harga }}"
           class="w-full p-3 border rounded-xl">

    <textarea name="product_deskripsi"
              class="w-full p-3 border rounded-xl">{{ $item->product_deskripsi }}</textarea>

    <input type="file" name="product_thumbnail"
           class="w-full p-3 border rounded-xl">

    @if($item->product_thumbnail)
        <img src="{{ asset($item->product_thumbnail) }}"
             class="w-20 h-20 rounded-xl mt-2">
    @endif

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="product_featured"
               {{ $item->product_featured ? 'checked' : '' }}>
        Featured Product
    </label>

    <select name="product_status"
            class="w-full p-3 border rounded-xl">

        <option value="draft" {{ $item->product_status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="active" {{ $item->product_status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="archived" {{ $item->product_status == 'archived' ? 'selected' : '' }}>Archived</option>

    </select>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Update
    </button>

</form>

@endsection