<aside class="fixed md:w-72 w-0 md:block hidden h-screen bg-white/80 backdrop-blur-xl border-r"
       style="border-color: color-mix(in srgb, {{ $setting->theme_primary ?? '#ec4899' }} 15%, white);">

    {{-- BRAND --}}
    <div class="p-6 border-b"
         style="border-color: color-mix(in srgb, {{ $setting->theme_primary ?? '#ec4899' }} 15%, white);">

        <div class="flex items-center gap-3">

            @if(!empty($setting->site_logo))
                <img src="{{ asset($setting->site_logo) }}"
                     class="w-12 h-12 object-contain rounded-2xl">
            @else
                <div class="w-12 h-12 rounded-2xl text-white flex items-center justify-center font-bold"
                     style="background: {{ $setting->theme_primary ?? '#ec4899' }};">
                    {{ strtoupper(substr($setting->site_name ?? 'N', 0, 1)) }}
                </div>
            @endif

            <div>
                <h1 class="text-xl font-bold"
                    style="color: {{ $setting->theme_primary ?? '#ec4899' }};">
                    {{ $setting->site_name ?? 'Nathala CMS' }}
                </h1>

                <p class="text-xs text-gray-500">
                    {{ $setting->site_tagline ?? 'Affiliate CMS' }}
                </p>
            </div>

        </div>
    </div>

    {{-- MENU --}}
    <nav class="p-4 space-y-1 text-sm overflow-y-auto h-[calc(100vh-88px)]">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.dashboard')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="layout-dashboard"></i>
            Dashboard
        </a>

        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">Master Data</p>

        <a href="{{ route('admin.kategori.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.kategori.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.kategori.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="layers"></i>
            Kategori
        </a>

        <a href="{{ route('admin.product.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.product.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.product.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="shopping-bag"></i>
            Produk
        </a>

        <a href="{{ route('admin.slider.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.slider.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.slider.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="image"></i>
            Slider
        </a>

        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">Affiliate</p>

        <a href="{{ route('admin.click.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.click.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.click.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="mouse-pointer-click"></i>
            Click Tracking
        </a>

        <a href="{{ route('admin.analytics.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.analytics.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.analytics.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="bar-chart-3"></i>
            Analytics
        </a>

        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">Content</p>

        <a href="{{ route('admin.page.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.page.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.page.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="file-text"></i>
            Pages
        </a>

        <a href="{{ route('admin.menu.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.menu.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.menu.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="menu-square"></i>
            Menu Builder
        </a>

        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">System</p>

        <a href="{{ route('admin.setting.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.setting.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.setting.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="settings-2"></i>
            Settings
        </a>

        <a href="{{ route('admin.adminuser.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.adminuser.*') ? 'text-white' : 'hover:bg-gray-50' }}"
           @if(request()->routeIs('admin.adminuser.*')) style="background: {{ $setting->theme_primary ?? '#ec4899' }};" @endif>
            <i data-lucide="users"></i>
            Admin User
        </a>

    </nav>

</aside>