@extends('admin.layouts.app')

@section('title', 'Tambah Menu')
@section('page_title', 'Tambah Menu')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.menu.store') }}"
      class="bg-white/80 backdrop-blur-xl border rounded-2xl p-6 space-y-5"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf

    <div>
        <label class="text-sm text-gray-600">Nama Menu</label>
        <input type="text"
               name="menu_nama"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">URL</label>
        <input type="text"
               name="menu_url"
               placeholder="/about-us atau https://..."
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Target Link</label>
        <select name="menu_target"
                class="w-full p-3 rounded-xl border border-gray-200 bg-white">
            <option value="_self">Same Window (_self)</option>
            <option value="_blank">New Tab (_blank)</option>
        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Sort Order</label>
        <input type="number"
               name="menu_sort_order"
               value="0"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="menu_is_active"
               value="1"
               checked
               style="accent-color: {{ $primary }};">
        <span>Active</span>
    </label>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Simpan Menu
    </button>

</form>

@endsection