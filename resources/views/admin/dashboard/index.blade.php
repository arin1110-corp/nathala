@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<div class="space-y-8">

    {{-- WELCOME --}}
    <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl border shadow"
         style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

        <h1 class="text-3xl font-bold"
            style="color: {{ $primary }};">
            Welcome to {{ $setting->site_name ?? 'Nathala CMS' }}
        </h1>

        <p class="text-gray-500 mt-2">
            {{ $setting->site_tagline ?? 'Affiliate Management Dashboard' }}
        </p>
    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach([
            ['label' => 'Total Produk', 'value' => $totalProducts],
            ['label' => 'Total Kategori', 'value' => $totalKategori],
            ['label' => 'Total Click', 'value' => number_format($totalClick)],
            ['label' => 'Produk Featured', 'value' => $featuredProducts],
        ] as $card)

            <div class="bg-white/80 backdrop-blur-xl p-6 rounded-2xl border shadow"
                 style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

                <p class="text-gray-500 text-sm">{{ $card['label'] }}</p>

                <h1 class="text-3xl font-bold mt-2"
                    style="color: {{ $primary }};">
                    {{ $card['value'] }}
                </h1>

            </div>

        @endforeach

    </div>

    {{-- QUICK ACCESS --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

        @foreach([
            ['route' => 'admin.product.index', 'title' => 'Produk', 'desc' => 'Kelola produk affiliate'],
            ['route' => 'admin.kategori.index', 'title' => 'Kategori', 'desc' => 'Kelola kategori produk'],
            ['route' => 'admin.slider.index', 'title' => 'Slider', 'desc' => 'Banner homepage'],
            ['route' => 'admin.analytics.index', 'title' => 'Analytics', 'desc' => 'Statistik performa'],
        ] as $menu)

            <a href="{{ route($menu['route']) }}"
               class="bg-white p-5 rounded-2xl border shadow transition hover:-translate-y-1"
               style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

                <h3 class="font-semibold"
                    style="color: {{ $primary }};">
                    {{ $menu['title'] }}
                </h3>

                <p class="text-xs text-gray-500 mt-1">
                    {{ $menu['desc'] }}
                </p>

            </a>

        @endforeach

    </div>

    {{-- RECENT PRODUCTS --}}
    <div class="bg-white/80 backdrop-blur-xl p-6 rounded-3xl border shadow"
         style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-xl font-bold">
                Produk Terbaru
            </h2>

            <a href="{{ route('admin.product.index') }}"
               class="text-sm font-medium"
               style="color: {{ $primary }};">
                Lihat Semua →
            </a>

        </div>

        <div class="space-y-4">

            @forelse($recentProducts as $product)

                <div class="flex items-center justify-between pb-4 border-b border-gray-100">

                    <div>
                        <h3 class="font-semibold">
                            {{ $product->product_nama }}
                        </h3>

                        <p class="text-xs text-gray-400">
                            {{ $product->kategori->kategori_nama ?? '-' }}
                        </p>
                    </div>

                    <span class="px-3 py-1 rounded-xl text-xs
                        {{ $product->product_status == 'active'
                            ? 'bg-green-100 text-green-600'
                            : 'bg-yellow-100 text-yellow-600' }}">
                        {{ ucfirst($product->product_status) }}
                    </span>

                </div>

            @empty

                <p class="text-gray-400 text-sm">
                    Belum ada produk.
                </p>

            @endforelse

        </div>

    </div>

</div>

@endsection