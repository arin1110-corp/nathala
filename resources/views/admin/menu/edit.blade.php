@extends('admin.layouts.app')

@section('title', 'Edit Menu')
@section('page_title', 'Edit Menu')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.menu.update', $item->menu_id) }}"
      class="bg-white/80 backdrop-blur-xl border rounded-2xl p-6 space-y-5"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-gray-600">Nama Menu</label>
        <input type="text"
               name="menu_nama"
               value="{{ $item->menu_nama }}"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">URL</label>
        <input type="text"
               name="menu_url"
               value="{{ $item->menu_url }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <div>
        <label class="text-sm text-gray-600">Target Link</label>
        <select name="menu_target"
                class="w-full p-3 rounded-xl border border-gray-200 bg-white">

            <option value="_self"
                {{ $item->menu_target == '_self' ? 'selected' : '' }}>
                Same Window (_self)
            </option>

            <option value="_blank"
                {{ $item->menu_target == '_blank' ? 'selected' : '' }}>
                New Tab (_blank)
            </option>

        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Sort Order</label>
        <input type="number"
               name="menu_sort_order"
               value="{{ $item->menu_sort_order }}"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="menu_is_active"
               value="1"
               {{ $item->menu_is_active ? 'checked' : '' }}
               style="accent-color: {{ $primary }};">
        <span>Active</span>
    </label>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Update Menu
    </button>

</form>

@endsection