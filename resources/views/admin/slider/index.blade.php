@extends('admin.layouts.app')

@section('title', 'Slider')
@section('page_title', 'Slider')

@section('content')

<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Slider</h1>

    <a href="{{ route('admin.slider.create') }}"
       class="bg-pink-500 text-white px-4 py-2 rounded-2xl">
        + Tambah Slider
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-4 overflow-x-auto">
    <table id="sliderTable" class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Image</th>
                <th class="p-3">Judul</th>
                <th class="p-3">Posisi</th>
                <th class="p-3">Sort</th>
                <th class="p-3">Status</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
                <tr class="border-b hover:bg-pink-50/30">
                    <td class="p-3">
                        @if($item->slider_image)
                            <img src="{{ asset($item->slider_image) }}"
                                 class="w-20 h-12 rounded-xl object-cover">
                        @else
                            <div class="w-20 h-12 bg-pink-100 rounded-xl"></div>
                        @endif
                    </td>

                    <td class="p-3 font-medium">
                        {{ $item->slider_judul ?? $item->slider_nama ?? '-' }}
                    </td>

                    <td class="p-3">
                        {{ ucfirst($item->slider_posisi) }}
                    </td>

                    <td class="p-3">
                        {{ $item->slider_sort_order }}
                    </td>

                    <td class="p-3">
                        @if($item->slider_is_active)
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-xl">
                                Active
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-xl">
                                Inactive
                            </span>
                        @endif
                    </td>

                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.slider.edit', $item->slider_id) }}"
                           class="px-3 py-1 bg-blue-100 text-blue-600 rounded-xl text-xs">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.slider.toggle', $item->slider_id) }}">
                            @csrf
                            @method('PATCH')

                            @if($item->slider_is_active)
                                <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-xl text-xs">
                                    Nonaktifkan
                                </button>
                            @else
                                <button class="px-3 py-1 bg-green-100 text-green-600 rounded-xl text-xs">
                                    Aktifkan
                                </button>
                            @endif
                        </form>

                        <form method="POST" action="{{ route('admin.slider.destroy', $item->slider_id) }}">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus slider ini?')"
                                    class="px-3 py-1 bg-red-100 text-red-600 rounded-xl text-xs">
                                Hapus
                            </button>
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
    $(function () {
        if (!$.fn.DataTable.isDataTable('#sliderTable')) {
            $('#sliderTable').DataTable({
                pageLength: 10,
                searching: true,
                ordering: true
            });
        }
    });
</script>
@endpush