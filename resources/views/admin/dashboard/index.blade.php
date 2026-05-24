@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- CARD --}}
    <div class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 shadow">
        <p class="text-gray-500 text-sm">Total Produk</p>
        <h1 class="text-3xl font-bold">0</h1>
    </div>

    <div class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 shadow">
        <p class="text-gray-500 text-sm">Total Kategori</p>
        <h1 class="text-3xl font-bold">0</h1>
    </div>

    <div class="bg-white/70 backdrop-blur-xl p-6 rounded-2xl border border-pink-100 shadow">
        <p class="text-gray-500 text-sm">Total Click</p>
        <h1 class="text-3xl font-bold">0</h1>
    </div>

</div>

@endsection