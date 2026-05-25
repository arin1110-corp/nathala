@extends('admin.layouts.app')

@section('title', 'Admin User')
@section('page_title', 'Admin User')

@section('content')

<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold">Admin User</h1>

    <a href="{{ route('admin.adminuser.create') }}"
       class="bg-pink-500 text-white px-4 py-2 rounded-2xl">
        + Tambah Admin
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white/70 backdrop-blur-xl border border-pink-100 rounded-2xl p-4 overflow-x-auto">

    <table id="adminTable" class="w-full text-sm">

        <thead>
            <tr class="text-left border-b">
                <th class="p-3">Nama</th>
                <th class="p-3">Email</th>
                <th class="p-3">Status</th>
                <th class="p-3">Created</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($data as $item)
                <tr class="border-b hover:bg-pink-50/30">

                    <td class="p-3 font-medium">
                        {{ $item->admin_nama }}
                    </td>

                    <td class="p-3 text-gray-500">
                        {{ $item->admin_email }}
                    </td>

                    <td class="p-3">
                        @if($item->admin_is_active)
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-xl">
                                Active
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-xl">
                                Inactive
                            </span>
                        @endif
                    </td>

                    <td class="p-3">
                        {{ $item->created_at?->format('d M Y') }}
                    </td>

                    <td class="p-3 flex gap-2">

                        <a href="{{ route('admin.adminuser.edit', $item->admin_id) }}"
                           class="px-3 py-1 bg-blue-100 text-blue-600 rounded-xl text-xs">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.adminuser.toggle', $item->admin_id) }}">
                            @csrf
                            @method('PATCH')

                            @if($item->admin_is_active)
                                <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-xl text-xs">
                                    Nonaktifkan
                                </button>
                            @else
                                <button class="px-3 py-1 bg-green-100 text-green-600 rounded-xl text-xs">
                                    Aktifkan
                                </button>
                            @endif
                        </form>

                        <form method="POST"
                              action="{{ route('admin.adminuser.destroy', $item->admin_id) }}">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus admin ini?')"
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
        if (!$.fn.DataTable.isDataTable('#adminTable')) {
            $('#adminTable').DataTable({
                pageLength: 10
            });
        }
    });
</script>
@endpush