@extends('admin.layouts.app')

@section('title', 'Menu Builder')
@section('page_title', 'Menu Builder')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Menu Builder</h1>

    <a href="{{ route('admin.menu.create') }}"
       class="text-white px-4 py-2 rounded-2xl"
       style="background: {{ $primary }};">
        + Tambah Menu
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white/80 backdrop-blur-xl border rounded-2xl p-4 overflow-x-auto"
     style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    <table id="menuTable" class="w-full text-sm">

        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Nama</th>
                <th class="p-3">URL</th>
                <th class="p-3">Target</th>
                <th class="p-3">Sort</th>
                <th class="p-3">Status</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3 font-medium">
                        {{ $item->menu_nama }}
                    </td>

                    <td class="p-3 text-gray-500">
                        {{ $item->menu_url ?? '-' }}
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded-xl"
                              style="background: color-mix(in srgb, {{ $primary }} 12%, white); color: {{ $primary }};">
                            {{ $item->menu_target }}
                        </span>
                    </td>

                    <td class="p-3">
                        {{ $item->menu_sort_order }}
                    </td>

                    <td class="p-3">
                        @if($item->menu_is_active)
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

                        <a href="{{ route('admin.menu.edit', $item->menu_id) }}"
                           class="px-3 py-1 rounded-xl text-xs"
                           style="background: color-mix(in srgb, {{ $primary }} 12%, white); color: {{ $primary }};">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.menu.toggle', $item->menu_id) }}">
                            @csrf
                            @method('PATCH')

                            @if($item->menu_is_active)
                                <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-xl text-xs">
                                    Nonaktifkan
                                </button>
                            @else
                                <button class="px-3 py-1 bg-green-100 text-green-600 rounded-xl text-xs">
                                    Aktifkan
                                </button>
                            @endif
                        </form>

                        <form method="POST" action="{{ route('admin.menu.destroy', $item->menu_id) }}">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus menu ini?')"
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
        if (!$.fn.DataTable.isDataTable('#menuTable')) {
            $('#menuTable').DataTable({
                pageLength: 10
            });
        }
    });
</script>
@endpush