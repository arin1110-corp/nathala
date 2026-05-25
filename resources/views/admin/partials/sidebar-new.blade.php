<aside class="fixed md:w-72 w-0 md:block hidden h-screen bg-white/70 backdrop-blur-xl border-r border-pink-100">

    {{-- BRAND --}}
    <div class="p-6 border-b border-pink-100">
        <h1 class="text-2xl font-bold text-pink-500">Nathala</h1>
        <p class="text-xs text-gray-500">Affiliate CMS</p>
    </div>

    {{-- MENU --}}
    <nav class="p-4 space-y-1 text-sm overflow-y-auto h-[calc(100vh-88px)]">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.dashboard') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="layout-dashboard"></i>
            Dashboard
        </a>

        {{-- MASTER DATA --}}
        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">Master Data</p>

        {{-- KATEGORI --}}
        <a href="{{ route('admin.kategori.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.kategori.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="layers"></i>
            Kategori
        </a>

        {{-- PRODUK --}}
        <a href="{{ route('admin.product.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.product.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="shopping-bag"></i>
            Produk
        </a>

        {{-- SLIDER --}}
        <a href="{{ route('admin.slider.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.slider.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="image"></i>
            Slider
        </a>

        {{-- AFFILIATE --}}
        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">Affiliate</p>

        <a href="{{ route('admin.click.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.click.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="mouse-pointer-click"></i>
            Click Tracking
        </a>

        <a href="{{ route('admin.analytics.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.analytics.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="bar-chart-3"></i>
            Analytics
        </a>

        {{-- CONTENT --}}
        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">Content</p>

        <a href="{{ route('admin.page.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.page.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="file-text"></i>
            Pages
        </a>

        <a href="{{ route('admin.menu.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.menu.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="menu-square"></i>
            Menu Builder
        </a>


        {{-- SYSTEM --}}
        <p class="px-4 pt-4 text-xs text-gray-400 uppercase">System</p>

        <a href="{{ route('admin.setting.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.setting.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="settings-2"></i>
            Settings
        </a>

        <a href="{{ route('admin.adminuser.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl
           {{ request()->routeIs('admin.adminuser.*') ? 'bg-pink-500 text-white' : 'hover:bg-pink-50' }}">
            <i data-lucide="users"></i>
            Admin User
        </a>

    </nav>

</aside>