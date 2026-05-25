@extends('admin.layouts.app')

@section('title', 'Tambah Admin')
@section('page_title', 'Tambah Admin')

@section('content')

<form method="POST"
      action="{{ route('admin.adminuser.store') }}"
      class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-6 space-y-5">

    @csrf

    <div>
        <label class="text-sm text-gray-600">Nama Admin</label>
        <input type="text"
               name="admin_name"
               class="w-full p-3 rounded-xl border border-pink-100"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Email</label>
        <input type="email"
               name="admin_email"
               class="w-full p-3 rounded-xl border border-pink-100"
               required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Password</label>
        <input type="password"
               name="admin_password"
               class="w-full p-3 rounded-xl border border-pink-100"
               required>
    </div>

    <label class="flex items-center gap-2">
        <input type="checkbox"
               name="admin_is_active"
               value="1"
               checked>
        <span>Active</span>
    </label>

    <button class="bg-pink-500 text-white px-6 py-2 rounded-xl">
        Simpan Admin
    </button>

</form>

@endsection