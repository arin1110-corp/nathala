<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Dashboard') - {{ $setting->site_name ?? 'Nathala CMS' }}
    </title>

    @if (!empty($setting->site_favicon))
        <link rel="icon" href="{{ asset($setting->site_favicon) }}">
    @endif

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.min.js"></script>

</head>

<body class="bg-gradient-to-br from-pink-50 via-white to-rose-50 h-screen overflow-hidden">

    <div class="flex h-screen">

        {{-- SIDEBAR --}}
        @include('admin.partials.sidebar-new')

        {{-- MAIN --}}
        <div class="flex-1 flex flex-col overflow-hidden md:ml-72">

            {{-- NAVBAR --}}
            @include('admin.partials.navbar')

            {{-- CONTENT --}}
            <main class="flex-1 overflow-y-auto p-6 md:p-8">
                @yield('content')
            </main>

            {{-- FOOTER --}}
            @include('admin.partials.footer-new')

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>

    @stack('scripts')

</body>

</html>