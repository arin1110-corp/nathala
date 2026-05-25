<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

        <a href="{{ route('front.home') }}" class="flex items-center gap-3">
            @if(!empty($setting->site_logo))
                <img src="{{ asset($setting->site_logo) }}" class="h-10 object-contain">
            @else
                <div class="w-10 h-10 rounded-2xl theme-primary-bg text-white flex items-center justify-center font-bold">
                    A
                </div>
            @endif

            <div>
                <h1 class="font-bold text-lg theme-primary-text">
                    {{ $setting->site_name ?? 'Affiliate Picks' }}
                </h1>
                <p class="text-xs text-slate-400">
                    {{ $setting->site_tagline ?? 'Discover the best affiliate products' }}
                </p>
            </div>
        </a>

        <nav class="hidden md:flex items-center gap-6 text-sm">
            @foreach($menus as $menu)
                <a href="{{ $menu->menu_url }}"
                   target="{{ $menu->menu_target }}"
                   class="text-slate-600 theme-hover transition">
                    {{ $menu->menu_nama }}
                </a>
            @endforeach
        </nav>

    </div>
</header>