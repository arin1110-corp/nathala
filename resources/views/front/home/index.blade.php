@extends('front.layouts.app')

@section('content')

{{-- HERO / SLIDER --}}
<section class="max-w-7xl mx-auto px-4 pt-6 md:pt-8">

    @if($sliders->count())
        <div class="grid grid-cols-1 gap-6">

            @foreach($sliders as $slider)
                <div class="relative overflow-hidden rounded-[26px] md:rounded-[32px] theme-card shadow-xl min-h-[520px] md:min-h-0">

                    @if($slider->slider_image)
                        <img src="{{ asset($slider->slider_image) }}"
                             alt="{{ $slider->slider_alt_text ?? $slider->slider_judul }}"
                             class="absolute inset-0 w-full h-full md:relative md:h-[420px] object-cover">
                    @else
                        <div class="absolute inset-0 md:relative md:h-[420px] theme-soft"></div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-black/75 via-black/40 to-transparent"></div>

                    <div class="relative md:absolute inset-0 flex items-end md:items-center min-h-[520px] md:min-h-0">
                        <div class="p-6 md:p-12 max-w-xl text-white">

                            @if($slider->slider_nama)
                                <p class="text-xs md:text-sm theme-button inline-block px-3 py-1 rounded-full mb-3 md:mb-4">
                                    {{ $slider->slider_nama }}
                                </p>
                            @endif

                            <h2 class="text-3xl md:text-5xl font-bold leading-tight">
                                {{ $slider->slider_judul ?? 'Produk Pilihan Nathala' }}
                            </h2>

                            @if($slider->slider_deskripsi)
                                <p class="mt-3 md:mt-4 text-sm md:text-base text-white/85 leading-relaxed">
                                    {{ $slider->slider_deskripsi }}
                                </p>
                            @endif

                            @if($slider->slider_link)
                                <a href="{{ $slider->slider_link }}"
                                   class="inline-block mt-5 md:mt-6 theme-outline-button px-5 py-3 rounded-2xl font-semibold">
                                    {{ $slider->slider_button_text ?? 'Lihat Sekarang' }}
                                </a>
                            @endif

                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    @else
        <div class="rounded-[26px] md:rounded-[32px] theme-card shadow-xl p-8 md:p-16">
            <h2 class="text-4xl md:text-6xl font-bold text-slate-800">
                Rekomendasi Produk Pilihan
            </h2>

            <p class="mt-4 text-slate-500 max-w-xl">
                Temukan produk affiliate pilihan dengan tampilan ringkas, rapi, dan mudah dibeli.
            </p>

            <a href="#produk"
               class="inline-block mt-6 theme-button px-5 py-3 rounded-2xl">
                Jelajahi Produk
            </a>
        </div>
    @endif

</section>

{{-- KATEGORI --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 mt-14">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">
            Kategori Pilihan
        </h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

        @forelse($kategori as $kat)
            <a href="{{ route('front.kategori.detail', $kat->kategori_slug) }}"
               class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-3xl p-4 hover:shadow-xl transition">

                @if($kat->kategori_thumbnail)
                    <img src="{{ asset($kat->kategori_thumbnail) }}"
                         class="w-full h-32 object-cover rounded-2xl mb-4">
                @else
                    <div class="w-full h-32 bg-pink-100 rounded-2xl mb-4"></div>
                @endif

                <h3 class="font-semibold">
                    {{ $kat->kategori_nama }}
                </h3>

                @if($kat->kategori_deskripsi)
                    <p class="text-xs text-slate-400 mt-1">
                        {{ Str::limit($kat->kategori_deskripsi, 60) }}
                    </p>
                @endif

            </a>
        @empty
            <div class="col-span-full text-center text-slate-400 py-10">
                Belum ada kategori aktif.
            </div>
        @endforelse

    </div>

</section>

{{-- FEATURED PRODUCT --}}
@if($featuredProducts->count())
<section class="max-w-7xl mx-auto px-4 mt-14">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">
            Produk Unggulan
        </h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
        @foreach($featuredProducts as $product)
            @include('front.home.product-card', ['product' => $product])
        @endforeach
    </div>

</section>
@endif

{{-- LATEST PRODUCT --}}
<section id="produk" class="max-w-7xl mx-auto px-4 mt-14">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">
            Produk Terbaru
        </h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

        @forelse($latestProducts as $product)
            @include('front.home.product-card', ['product' => $product])
        @empty
            <div class="col-span-full text-center text-slate-400 py-10">
                Belum ada produk aktif.
            </div>
        @endforelse

    </div>

</section>

@endsection