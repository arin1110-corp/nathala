<!-- Sidebar -->
<aside class="w-64 h-screen fixed left-0 top-0 bg-white border-r flex flex-col">

    <!-- Logo -->
    <div class="p-6 flex items-center gap-3 border-b">
        <div class="w-11 h-11 pink-gradient rounded-xl pink-glow"></div>
        <h1 class="text-xl font-bold">NATHALA</h1>
    </div>

    <!-- Menu -->
    <div class="flex-1 overflow-y-auto px-4 py-4 space-y-2 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="menu-item menu-active flex items-center gap-3 px-4 py-2 rounded-lg">🏠
            Dashboard</a>
        <a href="{{ route('admin.product') }}" class="menu-item flex items-center gap-3 px-4 py-2 text-gray-600 rounded-lg">📦
            Products</a>
        <a href="#" class="menu-item flex items-center gap-3 px-4 py-2 text-gray-600 rounded-lg">🛒
            Orders</a>
        <a href="#" class="menu-item flex items-center gap-3 px-4 py-2 text-gray-600 rounded-lg">🤖 AI
            Generator</a>
        <a href="#" class="menu-item flex items-center gap-3 px-4 py-2 text-gray-600 rounded-lg">📊
            Analytics</a>
    </div>

    <!-- Bottom -->
    <div class="p-4 border-t">
        <div class="pink-gradient text-white p-4 rounded-xl pink-glow">
            <p class="text-sm font-semibold">Upgrade AI</p>
            <p class="text-xs opacity-80">Unlock more features</p>
        </div>
    </div>

</aside>
