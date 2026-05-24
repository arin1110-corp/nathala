@extends('admin.layouts.app')

@section('title', 'Product')

@section('content')

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Product</h1>

        <a href="{{ route('admin.product.create') }}" class="bg-pink-500 text-white px-4 py-2 rounded-2xl">
            + Tambah Product
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-4 overflow-x-auto">

        <table id="productTable" class="w-full text-sm">

            <thead>
                <tr class="text-left border-b">
                    <th class="p-3">Image</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($data as $item)
                    <tr class="border-b hover:bg-pink-50/30">

                        {{-- IMAGE --}}
                        <td class="p-3">
                            @if ($item->product_thumbnail)
                                <img src="{{ asset($item->product_thumbnail) }}" class="w-12 h-12 rounded-xl object-cover">
                            @else
                                <div class="w-12 h-12 bg-pink-100 rounded-xl"></div>
                            @endif
                        </td>

                        {{-- NAMA --}}
                        <td class="p-3 font-medium">
                            {{ $item->product_nama }}

                            @if ($item->product_featured)
                                <span class="text-xs bg-pink-100 text-pink-600 px-2 py-1 rounded-xl ml-2">
                                    Featured
                                </span>
                            @endif
                        </td>

                        {{-- KATEGORI --}}
                        <td class="p-3">
                            {{ $item->kategori->kategori_nama ?? '-' }}
                        </td>

                        {{-- HARGA --}}
                        <td class="p-3">
                            @if ($item->product_harga)
                                Rp {{ number_format($item->product_harga) }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- STATUS --}}
                        <td class="p-3">
                            <span
                                class="px-2 py-1 text-xs rounded-xl
                        {{ $item->product_status == 'active' ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600' }}">
                                {{ ucfirst($item->product_status) }}
                            </span>
                        </td>

                        {{-- ACTION --}}
                        <td class="p-3 flex gap-2">

                            <a href="{{ route('admin.product.edit', $item->product_id) }}"
                                class="px-3 py-1 bg-blue-100 text-blue-600 rounded-xl text-xs">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.product.toggle', $item->product_id) }}">
                                @csrf
                                @method('PATCH')

                                @if ($item->product_status == 'active')
                                    <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-xl text-xs">
                                        Nonaktifkan
                                    </button>
                                @else
                                    <button class="px-3 py-1 bg-green-100 text-green-600 rounded-xl text-xs">
                                        Aktifkan
                                    </button>
                                @endif
                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

@endsection

@push('scripts')
    <script>
        $(function() {
            $('#productTable').DataTable({
                pageLength: 10,
                responsive: true
            });
        });
    </script>
@endpush
