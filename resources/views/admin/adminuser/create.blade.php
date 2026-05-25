@extends('admin.layouts.app')

@section('title', 'Tambah Admin')
@section('page_title', 'Tambah Admin')

@section('content')

@php
    $primary = $setting->theme_primary ?? '#ec4899';
@endphp

<form method="POST"
      action="{{ route('admin.adminuser.store') }}"
      class="bg-white/80 backdrop-blur-xl border rounded-2xl p-6 space-y-5"
      style="border-color: color-mix(in srgb, {{ $primary }} 15%, white);">

    @csrf

    <div>
        <label class="text-sm text-gray-600">Nama Admin</label>
        <input type="text"
               name="admin_name"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Email</label>
        <input type="email"
               name="admin_email"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Password</label>
        <input type="password"
               name="admin_password"
               class="w-full p-3 rounded-xl border border-gray-200"
               required>
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="admin_is_active"
               value="1"
               checked
               style="accent-color: {{ $primary }};">
        <span>Active</span>
    </label>

    <button class="text-white px-6 py-2 rounded-xl"
            style="background: {{ $primary }};">
        Simpan Admin
    </button>

</form>

@endsection