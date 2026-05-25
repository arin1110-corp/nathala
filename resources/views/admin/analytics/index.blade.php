@extends('admin.layouts.app')

@section('title', 'Analytics')
@section('page_title', 'Analytics')

@section('content')

{{-- SUMMARY --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Total Click</p>
        <h2 class="text-3xl font-bold text-pink-500">
            {{ number_format($totalClick) }}
        </h2>
    </div>

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Total Product</p>
        <h2 class="text-3xl font-bold text-gray-800">
            {{ number_format($totalProduct) }}
        </h2>
    </div>

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Featured Product</p>
        <h2 class="text-3xl font-bold text-yellow-500">
            {{ number_format($featuredCount) }}
        </h2>
    </div>

    <div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6">
        <p class="text-sm text-gray-500">Total Terjual</p>
        <h2 class="text-3xl font-bold text-green-500">
            {{ number_format($totalSales) }}
        </h2>
    </div>

</div>

{{-- TOP PRODUCT --}}
<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6 mb-8">
    <h3 class="text-lg font-bold mb-2">Top Product</h3>

    <div class="flex items-center gap-4">
        @if($topProduct && $topProduct->product_thumbnail)
            <img src="{{ asset($topProduct->product_thumbnail) }}"
                 class="w-20 h-20 rounded-xl object-cover">
        @endif

        <div>
            <h4 class="font-bold text-xl">
                {{ $topProduct->product_nama ?? '-' }}
            </h4>

            <p class="text-pink-500 font-semibold">
                {{ number_format($topProduct->product_total_click ?? 0) }} clicks
            </p>
        </div>
    </div>
</div>

{{-- CHART --}}
<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6 mb-8">
    <h3 class="text-lg font-bold mb-4">Product Click Chart</h3>
    <canvas id="clickChart"></canvas>
</div>

{{-- TABLE --}}
<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-4 overflow-x-auto">
    <table id="analyticsTable" class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Produk</th>
                <th class="p-3">Kategori</th>
                <th class="p-3">Platform</th>
                <th class="p-3">Click</th>
                <th class="p-3">Sold</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
                <tr class="border-b hover:bg-pink-50/30">
                    <td class="p-3 font-medium">{{ $item->product_nama }}</td>

                    <td class="p-3">
                        {{ $item->kategori->kategori_nama ?? '-' }}
                    </td>

                    <td class="p-3">
                        {{ ucfirst($item->product_platform) }}
                    </td>

                    <td class="p-3 font-bold text-pink-500">
                        {{ number_format($item->product_total_click) }}
                    </td>

                    <td class="p-3 font-bold text-green-500">
                        {{ number_format($item->product_terjual) }}
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded-xl
                            {{ $item->product_status == 'active'
                                ? 'bg-green-100 text-green-600'
                                : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($item->product_status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(function () {
        $('#analyticsTable').DataTable({
            pageLength: 10
        });

        const ctx = document.getElementById('clickChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($data->take(10) as $item)
                        "{{ $item->product_nama }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Total Click',
                    data: [
                        @foreach($data->take(10) as $item)
                            {{ $item->product_total_click }},
                        @endforeach
                    ]
                }]
            }
        });
    });
</script>

@endpush