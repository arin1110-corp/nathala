<div class="bg-white/70 backdrop-blur-xl border-b border-pink-100 px-6 py-4 flex justify-between items-center">

    <div>
        <h2 class="text-xl font-bold text-gray-800">
            @yield('page_title', 'Dashboard')
        </h2>
    </div>

    <div class="flex items-center gap-4">

        <div class="text-sm text-gray-600">
            {{ auth('admin')->user()->admin_nama }}
        </div>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="px-4 py-2 bg-pink-500 text-white rounded-xl">
                Logout
            </button>
        </form>

    </div>

</div>