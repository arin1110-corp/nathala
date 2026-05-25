<div class="bg-white/70 backdrop-blur-xl border border-slate-100 rounded-3xl overflow-hidden hover:shadow-xl transition">

    <a href="{{ route('front.product.detail', $product->product_slug) }}">
        @if($product->product_thumbnail)
            <img src="{{ asset($product->product_thumbnail) }}"
                 class="w-full h-44 object-cover">
        @else
            <div class="w-full h-44 theme-soft"></div>
        @endif
    </a>

    <div class="p-4">

        <div class="flex items-center gap-2 mb-2">
            <span class="text-xs theme-soft theme-primary-text px-2 py-1 rounded-xl">
                {{ ucfirst($product->product_platform) }}
            </span>

            @if($product->product_badge)
                <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-xl">
                    {{ $product->product_badge }}
                </span>
            @endif
        </div>

        <a href="{{ route('front.product.detail', $product->product_slug) }}">
            <h3 class="font-semibold leading-snug theme-hover">
                {{ $product->product_nama }}
            </h3>
        </a>

        <p class="text-xs text-slate-400 mt-1">
            {{ $product->kategori->kategori_nama ?? '-' }}
        </p>

        @if($product->product_harga)
            <p class="font-bold theme-primary-text mt-3">
                Rp {{ number_format($product->product_harga, 0, ',', '.') }}
            </p>
        @endif

        <a href="{{ route('product.click', $product->product_slug) }}"
           target="_blank"
           rel="noopener noreferrer"
           class="block text-center mt-4 theme-button py-2 rounded-2xl text-sm">
            Beli Sekarang
        </a>

    </div>
</div>