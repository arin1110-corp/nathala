<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('meta_title', $setting->site_meta_title ?? ($setting->site_name ?? 'Affiliate Picks'))
    </title>

    <meta name="description" content="@yield('meta_description', $setting->site_meta_description ?? ($setting->site_description ?? ''))">

    @if (!empty($setting->site_favicon))
        <link rel="icon" href="{{ asset($setting->site_favicon) }}">
    @endif

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Google Analytics --}}
    @if (!empty($setting->site_google_analytics))
        {!! $setting->site_google_analytics !!}
    @endif

    {{-- Meta Pixel --}}
    @if (!empty($setting->site_meta_pixel))
        {!! $setting->site_meta_pixel !!}
    @endif

    {{-- Dynamic Theme --}}
    <style>
        :root {
            --primary: {{ $setting->theme_primary ?? '#ec4899' }};
            --secondary: {{ $setting->theme_secondary ?? '#fdf2f8' }};
            --accent: {{ $setting->theme_accent ?? '#f43f5e' }};
            --text: {{ $setting->theme_text ?? '#1e293b' }};
            --footer: {{ $setting->theme_footer ?? '#ffffff' }};
        }

        body {
            color: var(--text);
        }

        .theme-bg {
            background: linear-gradient(
                135deg,
                var(--secondary),
                color-mix(in srgb, var(--secondary) 65%, white),
                #ffffff
            );
            color: var(--text);
        }

        .theme-primary-bg {
            background-color: var(--primary) !important;
        }

        .theme-primary-text {
            color: var(--primary) !important;
        }

        .theme-primary-border {
            border-color: var(--primary) !important;
        }

        .theme-card {
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid color-mix(in srgb, var(--primary) 16%, white);
            backdrop-filter: blur(16px);
        }

        .theme-soft {
            background-color: color-mix(in srgb, var(--primary) 12%, white) !important;
        }

        .theme-soft-text {
            color: var(--primary) !important;
        }

        .theme-button {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            transition: 0.2s ease;
        }

        .theme-button:hover {
            background-color: var(--accent) !important;
            color: #ffffff !important;
        }

        .theme-outline-button {
            background-color: #ffffff !important;
            color: var(--primary) !important;
            border: 1px solid var(--primary) !important;
            transition: 0.2s ease;
        }

        .theme-outline-button:hover {
            background-color: var(--primary) !important;
            color: #ffffff !important;
        }

        .theme-hover:hover {
            color: var(--primary) !important;
        }

        .theme-icon-hover:hover {
            background-color: var(--primary) !important;
            color: #ffffff !important;
        }

        .theme-footer {
            background-color: var(--footer) !important;
        }
    </style>
</head>

<body class="theme-bg">

    @include('front.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('front.partials.footer')

</body>

</html>