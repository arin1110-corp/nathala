@extends('admin.layouts.app')

@section('title', 'Click Tracking')
@section('page_title', 'Click Tracking')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Total Click</p>
        <h2 class="text-3xl font-bold text-pink-500">
            {{ number_format($totalClick) }}
        </h2>
    </div>

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Total Produk</p>
        <h2 class="text-3xl font-bold text-gray-800">
            {{ $data->count() }}
        </h2>
    </div>

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Top Product</p>
        <h2 class="text-lg font-bold text-gray-800 truncate">
            {{ $topProduct->product_nama ?? '-' }}
        </h2>
        <p class="text-sm text-pink-500">
            {{ number_format($topProduct->product_total_click ?? 0) }} click
        </p>
    </div>

</div>

<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-4 overflow-x-auto">

    <table id="clickTable" class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Produk</th>
                <th class="p-3">Kategori</th>
                <th class="p-3">Platform</th>
                <th class="p-3">Total Click</th>
                <th class="p-3">Status</th>
                <th class="p-3">Link</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
                <tr class="border-b hover:bg-pink-50/30">
                    <td class="p-3 font-medium">
                        {{ $item->product_nama }}
                    </td>

                    <td class="p-3">
                        {{ $item->kategori->kategori_nama ?? '-' }}
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 text-xs bg-pink-100 text-pink-600 rounded-xl">
                            {{ ucfirst($item->product_platform) }}
                        </span>
                    </td>

                    <td class="p-3 font-bold text-pink-500">
                        {{ number_format($item->product_total_click) }}
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded-xl
                            {{ $item->product_status == 'active'
                                ? 'bg-green-100 text-green-600'
                                : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($item->product_status) }}
                        </span>
                    </td>

                    <td class="p-3">
                        <a href="{{ route('product.click', $item->product_slug) }}"
                           target="_blank"
                           class="px-3 py-1 bg-blue-100 text-blue-600 rounded-xl text-xs">
                            Test Click
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@push('scripts')
<script>
    $(function () {
        if (!$.fn.DataTable.isDataTable('#clickTable')) {
            $('#clickTable').DataTable({
                pageLength: 10,
                searching: true,
                ordering: true
            });
        }
    });
</script>
@endpush