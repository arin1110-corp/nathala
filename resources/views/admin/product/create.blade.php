@extends('admin.layouts.app')

@section('title', 'Tambah Product')

@section('content')

<h1 class="text-2xl font-bold mb-6">Tambah Product</h1>

<form method="POST"
      action="{{ route('admin.product.store') }}"
      enctype="multipart/form-data"
      class="space-y-4 bg-white/70 p-6 rounded-2xl border border-pink-100">

    @csrf

    <input type="text" name="product_nama"
           placeholder="Nama Product"
           class="w-full p-3 border rounded-xl">

    <select name="product_kategori"
            class="w-full p-3 border rounded-xl">

        <option value="">Pilih Kategori</option>

        @foreach($kategori as $k)
            <option value="{{ $k->kategori_id }}">
                {{ $k->kategori_nama }}
            </option>
        @endforeach

    </select>

    <input type="text" name="product_merk"
           placeholder="Merk"
           class="w-full p-3 border rounded-xl">

    <input type="text" name="product_affiliate_link"
           placeholder="Affiliate Link"
           class="w-full p-3 border rounded-xl">

    <input type="number" name="product_harga"
           placeholder="Harga"
           class="w-full p-3 border rounded-xl">

    <textarea name="product_deskripsi"
              placeholder="Deskripsi"
              class="w-full p-3 border rounded-xl"></textarea>

    <input type="file" name="product_thumbnail"
           class="w-full p-3 border rounded-xl">

    {{-- FEATURED --}}
    <label class="flex items-center gap-2">
        <input type="checkbox" name="product_featured">
        Featured Product
    </label>

    {{-- STATUS --}}
    <select name="product_status"
            class="w-full p-3 border rounded-xl">
        <option value="draft">Draft</option>
        <option value="active">Active</option>
        <option value="archived">Archived</option>
    </select>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Simpan
    </button>

</form>

@endsection