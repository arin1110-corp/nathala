@php
    $primary = $setting->theme_primary ?? '#ec4899';
    $siteName = $setting->site_name ?? 'Affiliate CMS';
@endphp

<div class="bg-white/80 backdrop-blur-xl border-b px-6 py-4 flex justify-between items-center"
     style="border-color: color-mix(in srgb, {{ $primary }} 12%, white);">

    <div>
        <h2 class="text-xl font-bold text-gray-800">
            @yield('page_title', 'Dashboard')
        </h2>

        <p class="text-xs text-gray-500 mt-1">
            {{ $siteName }} Admin Panel
        </p>
    </div>

    <div class="flex items-center gap-4">

        <div class="text-sm text-gray-600 text-right">
            <div class="font-medium">
                {{ auth('admin')->user()->admin_nama }}
            </div>
            <div class="text-xs text-gray-400">
                Administrator
            </div>
        </div>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="px-4 py-2 text-white rounded-xl font-medium hover:opacity-90 transition"
                    style="background: {{ $primary }};">
                Logout
            </button>
        </form>

    </div>

</div>