@extends('admin.layouts.app')

@section('title', 'Edit Admin')
@section('page_title', 'Edit Admin')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.adminuser.update', $item->admin_id) }}"
      class="bg-white/80 backdrop-blur-xl border rounded-2xl p-6 space-y-5"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf
    @method('PUT')

    <div>
        <label class="text-sm text-gray-600">Nama Admin</label>
        <input type="text"
               name="admin_name"
               value="{{ $item->admin_name }}"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Email</label>
        <input type="email"
               name="admin_email"
               value="{{ $item->admin_email }}"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Password Baru (opsional)</label>
        <input type="password"
               name="admin_password"
               class="w-full p-3 rounded-xl border border-gray-200">
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="admin_is_active"
               value="1"
               {{ $item->admin_is_active ? 'checked' : '' }}
               style="accent-color: {{ $primary }};">
        <span>Active</span>
    </label>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Update Admin
    </button>

</form>

@endsection