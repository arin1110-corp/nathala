<footer class="mt-20 border-t border-slate-100 theme-footer backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

        <div>
            <h3 class="font-bold text-xl theme-primary-text">
                {{ $setting->site_name ?? 'Nathala' }}
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                {{ $setting->site_description ?? 'Rekomendasi produk pilihan terbaik.' }}
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Menu</h4>

            <div class="space-y-2 text-sm">
                @foreach ($menus as $menu)
                    <a href="{{ $menu->menu_url }}"
                       target="{{ $menu->menu_target }}"
                       class="block text-slate-500 theme-hover transition">
                        {{ $menu->menu_nama }}
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Connect With Us</h4>

            <div class="space-y-2 text-sm text-slate-500">
                @if ($setting->site_email)
                    <p>Email: {{ $setting->site_email }}</p>
                @endif

                @if ($setting->site_whatsapp)
                    <p>WhatsApp: {{ $setting->site_whatsapp }}</p>
                @endif
            </div>

            <div class="flex gap-3 mt-5">

                @if ($setting->site_instagram)
                    <a href="{{ $setting->site_instagram }}" target="_blank"
                       class="w-10 h-10 rounded-2xl theme-soft theme-primary-text theme-icon-hover transition flex items-center justify-center">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                @endif

                @if ($setting->site_tiktok)
                    <a href="{{ $setting->site_tiktok }}" target="_blank"
                       class="w-10 h-10 rounded-2xl theme-soft theme-primary-text theme-icon-hover transition flex items-center justify-center">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                @endif

                @if ($setting->site_youtube)
                    <a href="{{ $setting->site_youtube }}" target="_blank"
                       class="w-10 h-10 rounded-2xl theme-soft theme-primary-text theme-icon-hover transition flex items-center justify-center">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                @endif

                @if ($setting->site_facebook)
                    <a href="{{ $setting->site_facebook }}" target="_blank"
                       class="w-10 h-10 rounded-2xl theme-soft theme-primary-text theme-icon-hover transition flex items-center justify-center">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                @endif

            </div>
        </div>

    </div>

    <div class="text-center text-xs text-slate-400 pb-6 border-t border-slate-100 pt-6">
        © {{ date('Y') }} {{ $setting->site_name ?? 'Nathala Picks' }}. All rights reserved.
        <br>
        Crafted with ❤️ by <span class="font-semibold theme-primary-text">ARIN Digital Creative & IT Solutions</span>
    </div>
</footer>