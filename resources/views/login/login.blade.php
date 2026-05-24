<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pinksoft: '#fb7185'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-rose-50 flex items-center justify-center">

    <div class="w-full max-w-md px-6">

        {{-- CARD --}}
        <div class="bg-white/70 backdrop-blur-xl border border-pink-100 shadow-2xl rounded-[28px] p-8">

            {{-- ICON --}}
            <div class="flex justify-center mb-6">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-400 to-rose-400 flex items-center justify-center text-white shadow-lg">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
            </div>

            {{-- TITLE --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
                <p class="text-sm text-gray-500">Nathala Affiliate CMS</p>
            </div>

            {{-- ERROR (CATCHABLE) --}}
            @if(session('error'))
                <div class="mb-4 p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" action="{{ route('admin.authenticate') }}" class="space-y-4">

                @csrf

                {{-- LOGIN --}}
                <div>
                    <label class="text-sm text-gray-600">Username / Email</label>
                    <input type="text" name="login"
                        class="w-full mt-1 px-4 py-3 rounded-2xl border border-pink-100 focus:ring-2 focus:ring-pink-300 outline-none bg-white/70"
                        placeholder="admin or email"
                        required>
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="text-sm text-gray-600">Password</label>
                    <input type="password" name="password"
                        class="w-full mt-1 px-4 py-3 rounded-2xl border border-pink-100 focus:ring-2 focus:ring-pink-300 outline-none bg-white/70"
                        placeholder="••••••••"
                        required>
                </div>

                {{-- BUTTON --}}
                <button type="submit"
                    class="w-full py-3 rounded-2xl bg-gradient-to-r from-pink-500 to-rose-400 text-white font-semibold shadow-lg hover:scale-[1.02] transition">
                    Login
                </button>

            </form>

        </div>

        {{-- FOOTER --}}
        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Nathala CMS
        </p>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>